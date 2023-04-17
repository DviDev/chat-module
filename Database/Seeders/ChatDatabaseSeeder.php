<?php

namespace Modules\Chat\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEnum;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEnum;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionEntityModel;
use Modules\Chat\Models\ChatCategoryChannelModel;
use Modules\Chat\Models\ChatCategoryChannelParticipantModel;
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
use Modules\Workspace\Models\WorkspaceChatModel;
use Modules\Workspace\Models\WorkspaceModel;

class ChatDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);

        $me = User::query()->where('id', 1)->first();
        $firsWorkspace = $me->workspaces()->first();
        $seed_total = config('app.SEED_MODULE_CATEGORY_COUNT');
        $seeded = 0;
        ChatModel::factory()
            ->for($me, 'user')
            ->count($seed_total)
            ->create();

        $me->chats()->each(function (ChatModel $chat) use ($me, $firsWorkspace, $seed_total, &$seeded) {
            $seeded++;
            ds("chat $seeded / $seed_total");

            WorkspaceChatModel::factory()
                ->for($firsWorkspace, 'workspace')
                ->for($chat, 'chat')
                ->create();

            $this->createParticipants($chat);

            $this->createChatCategories($chat);

            $this->createChatGroupPermissions($chat);

            $this->createChatUsers($chat);
        });

        // $this->call("OthersTableSeeder");
    }

    function createParticipants(ChatModel $chat): void
    {
        $p = ChatParticipantEntityModel::props();
        $participant = ChatParticipantModel::factory()->create([
            $p->chat_id => $chat->id,
            $p->user_id => $chat->user_id,
            $p->type => ChatParticipantEnum::owner->name,
        ]);
        ds("set owner chat $participant->chat_id as owner participant $participant->id");

        $participant = ChatParticipantModel::factory()->create([
            $p->chat_id => $chat->id,
            $p->user_id => User::factory()->create()->id,
            $p->type => ChatParticipantEnum::admin->name,
        ]);
        ds("chat $participant->chat_id as admin participant $participant->id");

        /**@var WorkspaceModel $workspace */
        $workspace = $chat->workspaces()->first();
        $builder = $workspace->participants()->whereNot('user_id', 1);
        $builder = $builder->limit($builder->count() -2);
        $participants = $builder->get();
        $seed_total = $participants->count() -2;
        $seeded = 0;
        $participants->each(function (User $user) use ($chat, $seed_total, &$seeded) {
            $p = ChatParticipantEntityModel::props();
            $participant = ChatParticipantModel::factory()->create([
                $p->chat_id => $chat->id,
                $p->user_id => $user->id,
                $p->type => ChatParticipantEnum::default->name,
            ]);

            $seeded++;
            ds("chat $participant->chat_id default participant user $user->id $seeded / $seed_total");
        });
    }

    function createChatCategories(ChatModel $chat): void
    {
        $seed_total = config('app.SEED_CHAT_CATEGORY_COUNT');
        $seeded = 0;
        ChatCategoryModel::factory()
            ->for($chat, 'chat')
            ->for($chat->user, 'user')
            ->count($seed_total)->create();

        $chat->categories()->each(function (ChatCategoryModel $category) use ($chat, $seed_total, &$seeded) {
            $seeded++;
            ds("chat $chat->id category $seeded / $seed_total");

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
            ds("create chat $chat->id category $channel->category_id channel $channel->id");

            $this->createCategoryChannelParticipants($channel, $chat);

            $this->createChannelTopics($channel, $chat);

            $user = ChatCategoryChannelUserEntityModel::props();
            $model = ChatCategoryChannelUserModel::factory()->create([
                $user->user_id => $chat->id,
                $user->channel_id => $channel->id,
            ]);
            ds("chat category channel $model->channel_id user $model->user_id");
        });
    }

    function createCategoryChannelParticipants(ChatCategoryChannelModel $channel, ChatModel $chat): void
    {
        $p = ChatCategoryChannelParticipantEntityModel::props();

        if (!ChatCategoryChannelParticipantModel::query()
            ->where($p->channel_id, $channel->id)
            ->where($p->user_id, $channel->category->created_by_user_id)->exists()) {
            $participant = ChatCategoryChannelParticipantModel::factory()->create([
                $p->channel_id => $channel->id,
                $p->user_id => $channel->category->created_by_user_id,
                $p->type => ChatCategoryChannelParticipantEnum::owner->name
            ]);
            ds("chat $chat->id categoryChannel $participant->channel_id participant owner $participant->id");
        }

        $participant = ChatCategoryChannelParticipantModel::factory()->create([
            $p->channel_id => $channel->id,
            $p->user_id => User::factory()->create()->id,
            $p->type => ChatCategoryChannelParticipantEnum::admin->name
        ]);
        ds("chat $chat->id categoryChannel $participant->channel_id participant admin $participant->id");

        $participants = $chat->participants()->whereNot('user_id', $channel->category->created_by_user_id);
        $seed_total = $participants->count();
        $seeded = 0;
        $participants->each(function (User $user) use ($channel, $chat, $seed_total, &$seeded) {
            $p = ChatCategoryChannelParticipantEntityModel::props();
            $participant = ChatCategoryChannelParticipantModel::factory()->create([
                $p->channel_id => $channel->id,
                $p->user_id => $user->id,
                $p->type => ChatCategoryChannelParticipantEnum::default->name
            ]);
            $seeded++;
            ds("chat $chat->id categoryChannel $participant->channel_id participant default $seeded / $seed_total");
        });
    }

    function createChannelTopics(ChatCategoryChannelModel $channel, ChatModel $chat): void
    {
        $topic = ChatCategoryChannelTopicEntityModel::props();
        $seed_total = config('app.SEED_MODULE_COUNT');
        $seeded = 0;
        ChatCategoryChannelTopicModel::factory()->count($seed_total)->create([
            $topic->channel_id => $channel->id,
            $topic->user_id => $chat->user_id
        ]);
        $channel->topics()
            ->each(function (ChatCategoryChannelTopicModel $topic) use ($channel, $chat, $seed_total, &$seeded) {
                $seeded++;
                ds("chat $chat->id category $channel->category_id channel $topic->channel_id topic $seeded / $seed_total");

                $this->createTopicMessages($topic);
            });
    }

    function createTopicMessages(ChatCategoryChannelTopicModel $topic): void
    {
        $participants = $topic->channel->participants();
//        dd("topic $topic->id channel $topic->channel_id participants {$participants->count()}");
        $seed_total = $participants->count();
        $seeded = 0;
        $participants->each(function (User $participant) use ($topic, $seed_total, &$seeded) {
            $msg = ChatCategoryChannelTopicMessageModel::factory()
                ->for($participant, 'user')
                ->for($topic, 'topic')
                ->create();
            $seeded++;
            ds("chat {$topic->channel->category->chat_id} category {$topic->channel->category_id} channel $topic->channel_id topic $topic->id user $msg->user_id message $seeded / $seed_total");
        });
    }

    function createChatGroupPermissions(ChatModel $chat): void
    {
        $config = ChatConfigEntityModel::props();
        ChatConfigModel::factory()->create([
            $config->chat_id => $chat->id
        ]);
        ChatPermissionModel::query()->each(function (ChatPermissionModel $permission) {
            ds("chat permission $permission->id $permission->name");

            $p = ChatGroupPermissionEntityModel::props();
            ChatGroupPermissionModel::factory()->create([
                $p->group_id => ChatPermissionGroupModel::factory()->create()->id,
                $p->permission_id => $permission->id
            ]);
        });
    }

    protected function createChatUsers(ChatModel $chat): void
    {
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
            ds("creating chat $chat->id user and permission $seeded / $seed_total");
        });
    }
}
