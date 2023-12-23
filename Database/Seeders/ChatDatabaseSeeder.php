<?php

namespace Modules\Chat\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Chat\Entities\ChannelParticipant\ChannelParticipantEntityModel;
use Modules\Chat\Entities\ChannelParticipant\ChatCategoryChannelParticipantEnum;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEnum;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionEntityModel;
use Modules\Chat\Models\ChannelParticipantModel;
use Modules\Chat\Models\ChatCategoryChannelModel;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageModel;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;
use Modules\Chat\Models\ChatCategoryChannelUserModel;
use Modules\Chat\Models\ChatCategoryModel;
use Modules\Chat\Models\ChatConfigModel;
use Modules\Chat\Models\ChatGroupPermissionModel;
use Modules\Chat\Models\ChatModel;
use Modules\Chat\Models\ChatParticipantModel;
use Modules\Chat\Models\ChatPermissionGroupModel;
use Modules\Chat\Models\ChatPermissionModel;
use Modules\Chat\Models\ChatUserModel;
use Modules\Chat\Models\ChatUserPermissionModel;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\Workspace\Models\WorkspaceChatModel;
use Modules\Workspace\Models\WorkspaceModel;

class ChatDatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        try {
            \DB::beginTransaction();

            $this->command->warn(PHP_EOL . '🤖 scanning chat module');

            (new ScanTableDomain())->scan('chat');

            $this->command->warn(PHP_EOL . '🤖🪴seeding chat permissions ...');
            $this->call(ChatPermissionTableSeeder::class);
//        $this->call(ChatProjectModuleTableSeeder::class);

            $this->command->warn(PHP_EOL . '🤖 🪴seeding chat categories...');
            $me = User::query()->where('id', 1)->first();
            $firsWorkspace = $me->workspaces()->first() ?: WorkspaceModel::factory()->create();
            $seed_total = config('chat.SEED_CHAT_CATEGORIES_COUNT');
            $seeded = 0;
            ChatModel::factory($seed_total)
                ->for($me, 'user')
                ->create();

            $me->chats()->with('user')->each(function (ChatModel $chat) use ($me, $firsWorkspace, $seed_total, &$seeded) {
                $seeded++;

                $this->command->warn(PHP_EOL . 'Criando workspace/chat ...');
                /*$this->withProgressBar(1, fn() => WorkspaceChatModel::factory()
                    ->for($firsWorkspace, 'workspace')
                    ->for($chat, 'chat')
                    ->create());*/

                WorkspaceChatModel::factory()
                    ->for($firsWorkspace, 'workspace')
                    ->for($chat, 'chat')
                    ->create();


                $this->createParticipants($chat);

                $this->createChatCategories($chat);

                $this->createChatGroupPermissions($chat);

                $this->createChatUsers($chat);
            });

            \DB::commit();
        } catch (\Exception $exception) {
            \DB::rollBack();
            $this->command->error("🔥🚒👨‍🚒".$exception->getMessage());
        }
    }

    function createParticipants(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL . 'Creating chat participants ...');
        $p = ChatParticipantEntityModel::props();
        ChatParticipantModel::factory()->create([
            $p->chat_id => $chat->id,
            $p->user_id => $chat->user_id,
            $p->type => ChatParticipantEnum::owner->name,
        ]);

        ChatParticipantModel::factory()->create([
            $p->chat_id => $chat->id,
            $p->user_id => User::factory()->create()->id,
            $p->type => ChatParticipantEnum::admin->name,
        ]);

        /**@var WorkspaceModel $workspace */
        $workspace = $chat->workspaces()->first();
        $builder = $workspace->participants()->whereNot('user_id', 1);
        $builder = $builder->limit($builder->count() -2);
        $participants = $builder->get();
        $seed_total = $participants->count() -2;
        $seeded = 0;
        $participants->each(function (User $user) use ($chat, $seed_total, &$seeded) {
            $p = ChatParticipantEntityModel::props();
            ChatParticipantModel::factory()->create([
                $p->chat_id => $chat->id,
                $p->user_id => $user->id,
                $p->type => ChatParticipantEnum::default->name,
            ]);
        });
    }

    function createChatCategories(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL . 'Creating chat categories ...');
        $seed_total = config('app.SEED_CHAT_CATEGORY_COUNT');
        $seeded = 0;
        ChatCategoryModel::factory()
            ->for($chat, 'chat')
            ->for($chat->user, 'user')
            ->count($seed_total)->create();

        $chat->categories()->each(function (ChatCategoryModel $category) use ($chat, $seed_total, &$seeded) {
            $seeded++;
            $this->createChatCategoryChannels($category, $chat);
        });
    }

    function createChatCategoryChannels(ChatCategoryModel $category, ChatModel $chat): void
    {
        $channel = ChatCategoryChannelEntityModel::props();
        ChatCategoryChannelModel::factory()->count(config('app.SEED_MODULE_CATEGORY_COUNT'))->create([
            $channel->category_id => $category->id
        ]);
        $category->channels()->each(function (ChatCategoryChannelModel $channel) use ($chat) {
            $this->createCategoryChannelParticipants($channel, $chat);

            $this->createChannelTopics($channel, $chat);

            $user = ChatCategoryChannelUserEntityModel::props();
            ChatCategoryChannelUserModel::factory()->create([
                $user->user_id => $chat->id,
                $user->channel_id => $channel->id,
            ]);
        });
    }

    function createCategoryChannelParticipants(ChatCategoryChannelModel $channel, ChatModel $chat): void
    {
        $p = ChannelParticipantEntityModel::props();

        if (!ChannelParticipantModel::query()
            ->where($p->channel_id, $channel->id)
            ->where($p->user_id, $channel->category->created_by_user_id)->exists()) {
            $participant = ChannelParticipantModel::factory()->create([
                $p->channel_id => $channel->id,
                $p->user_id => $channel->category->created_by_user_id,
                $p->type => ChatCategoryChannelParticipantEnum::owner->name
            ]);
        }

        $participant = ChannelParticipantModel::factory()->create([
            $p->channel_id => $channel->id,
            $p->user_id => User::factory()->create()->id,
            $p->type => ChatCategoryChannelParticipantEnum::admin->name
        ]);

        $participants = $chat->participants()->whereNot('user_id', $channel->category->created_by_user_id);
        $seeded = 0;
        $participants->each(function (User $user) use ($channel, $chat, &$seeded) {
            $p = ChannelParticipantEntityModel::props();
            ChannelParticipantModel::factory()->create([
                $p->channel_id => $channel->id,
                $p->user_id => $user->id,
                $p->type => ChatCategoryChannelParticipantEnum::default->name
            ]);
            $seeded++;
        });
    }

    function createChannelTopics(ChatCategoryChannelModel $channel, ChatModel $chat): void
    {
        $topic = ChatCategoryChannelTopicEntityModel::props();
        $seed_total = config('app.SEED_MODULE_COUNT');
        ChatCategoryChannelTopicModel::factory()->count($seed_total)->create([
            $topic->channel_id => $channel->id,
            $topic->user_id => $chat->user_id
        ]);
        $channel->topics()
            ->each(function (ChatCategoryChannelTopicModel $topic) use ($channel, $chat, $seed_total) {
                $this->createTopicMessages($topic);
            });
    }

    function createTopicMessages(ChatCategoryChannelTopicModel $topic): void
    {
        $participants = $topic->channel->participantUsers();
        $seed_total = $participants->count();
        $seeded = 0;
        $participants->each(function (User $participant) use ($topic, $seed_total, &$seeded) {
            ChatCategoryChannelTopicMessageModel::factory()
                ->for($participant, 'user')
                ->for($topic, 'topic')
                ->create();
            $seeded++;
        });
    }

    function createChatGroupPermissions(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL . 'Creating chat group permissions ...');
        $config = ChatConfigEntityModel::props();
        ChatConfigModel::factory()->create([$config->chat_id => $chat->id]);

        ChatPermissionModel::query()->each(function (ChatPermissionModel $permission) {
            $p = ChatGroupPermissionEntityModel::props();
            ChatGroupPermissionModel::factory()->create([
                $p->group_id => ChatPermissionGroupModel::factory()->create()->id,
                $p->permission_id => $permission->id
            ]);
        });
    }

    protected function createChatUsers(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL . 'Creating chat users ...');
        $participants = $chat->participants();
        $seed_total = $participants->count();
        $seeded = 0;
        $participants->each(function (User $user) use ($chat, $seed_total, &$seeded) {
            $chatUser = ChatUserEntityModel::props();
            ChatUserModel::factory()->create([
                $chatUser->user_id => $user->id,
                $chatUser->chat_id => $chat->id,
            ]);
            $permission = ChatUserPermissionEntityModel::props();
            ChatUserPermissionModel::factory()->create([
                $permission->user_id => $user->id,
                $permission->permission_id => ChatPermissionModel::query()->inRandomOrder()->first()->id
            ]);
            $seeded++;
        });
    }
}
