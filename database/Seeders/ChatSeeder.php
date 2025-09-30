<?php

declare(strict_types=1);

namespace Modules\Chat\Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Event;
use Modules\Base\Contracts\BaseSeeder;
use Modules\Base\Database\Seeders\SeederEventDTO;
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
use Modules\Person\Models\PersonModel;
use Modules\Post\Models\ThreadModel;
use Modules\Workspace\Models\WorkspaceChatModel;
use Modules\Workspace\Models\WorkspaceModel;
use Nwidart\Modules\Facades\Module;

final class ChatSeeder extends BaseSeeder
{
    protected ?SeederEventDTO $event = null;

    /**
     * Run the database seeds.
     */
    public function run($event = null): void
    {
        $this->command->warn(PHP_EOL.'🤖 ✔ '.str(__CLASS__)->explode('\\')->last().' ...');

        if (config('app.env') === 'production' && ! config('chat.SEED_CHATS_IN_PRODUCTION')) {
            $this->command->warn(PHP_EOL.'🤖 ✔ No Seed in production');

            return;
        }
        $this->event = $event;

        $this->call(ChatPermissionTableSeeder::class);

        $me = User::find(1);
        $firsWorkspace = collect(Module::allEnabled())->contains('Workspace')
            ? (WorkspaceModel::byUserId($me->id)->first() ?: WorkspaceModel::factory()->create())
            : null;

        $seed_total = config('chat.SEED_CHATS_COUNT');

        $chats = ChatModel::factory($seed_total)->for($me, 'user')->create();

        $chats->each(function (ChatModel $chat) use ($firsWorkspace): void {
            if ($this->event) {
                Event::dispatch($this->event->class(), $this->event->param('chat', $chat)->payload());
            }

            if (collect(Module::allEnabled())->contains('Workspace')) {
                $this->createWorkspaceChat($chat, $firsWorkspace);
                $this->createParticipants($chat);
            }

            $this->createChatCategories($chat);
            $this->createChatGroupPermissions($chat);
            $this->createChatUsers($chat);
        });

        $this->command->warn(PHP_EOL.'🤖 ✔ '.str(__CLASS__)->explode('\\')->last().' done');
    }

    public function createParticipants(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL.'🤖 '.str(__METHOD__)->explode('\\')->last().' ...');

        $p = ChatParticipantEntityModel::props();
        ChatParticipantModel::factory()->create([
            $p->chat_id => $chat->id,
            $p->user_id => $chat->user_id,
            $p->type => ChatParticipantEnum::owner->name,
        ]);
        $person = PersonModel::factory()->create();
        ChatParticipantModel::factory()->create([
            $p->chat_id => $chat->id,
            $p->user_id => User::factory()->create(['name' => $person->name, 'person_id' => $person->id])->id,
            $p->type => ChatParticipantEnum::admin->name,
        ]);

        if (collect(Module::allEnabled())->contains('Workspace')) {
            /** @var WorkspaceModel $workspace */
            $workspace = $chat->workspaces()->first();
            $builder = $workspace->participants()->whereNot('user_id', 1);
            $builder = $builder->limit($builder->count() - 2);
            $participants = $builder->get();
        } else {
            $participants = collect();
        }

        $participants->each(function (User $user) use ($chat): void {
            $p = ChatParticipantEntityModel::props();
            ChatParticipantModel::factory()->create([
                $p->chat_id => $chat->id,
                $p->user_id => $user->id,
                $p->type => ChatParticipantEnum::default->name,
            ]);
        });

        $this->command->info(PHP_EOL.'🤖 ✔️ '.str(__METHOD__)->explode('\\')->last().' done');
    }

    public function createChatCategories(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL.'🤖 '.str(__METHOD__)->explode('\\')->last().' ...');

        $seed_total = config('chat.SEED_CHAT_CATEGORIES_COUNT');

        ChatCategoryModel::factory()
            ->for($chat, 'chat')
            ->for($chat->user, 'user')
            ->count($seed_total)->create();
        $chat->categories()->each(function (ChatCategoryModel $category) use ($chat): void {
            $this->createChatCategoryChannels($category, $chat);
        });

        $this->command->info(PHP_EOL.'🤖 ✔️ '.str(__METHOD__)->explode('\\')->last().' done');
    }

    public function createChatCategoryChannels(ChatCategoryModel $category, ChatModel $chat): void
    {
        $channel = ChatCategoryChannelEntityModel::props();
        ChatCategoryChannelModel::factory()->count(config('chat.SEED_CHAT_CATEGORY_CHANNELS_COUNT'))->create([
            $channel->category_id => $category->id,
        ]);
        $category->channels()->with('category')->each(function (ChatCategoryChannelModel $channel) use ($chat): void {
            $this->createCategoryChannelParticipants($channel, $chat);
            $this->createChannelTopics($channel, $chat);
            $user = ChatCategoryChannelUserEntityModel::props();
            ChatCategoryChannelUserModel::query()->updateOrCreate([
                $user->user_id => $chat->id,
                $user->channel_id => $channel->id,
            ]);
        });
    }

    public function createCategoryChannelParticipants(ChatCategoryChannelModel $channel, ChatModel $chat): void
    {
        $p = ChannelParticipantEntityModel::props();
        if (! ChannelParticipantModel::query()
            ->where($p->channel_id, $channel->id)
            ->where($p->user_id, $channel->category->created_by_user_id)->exists()) {
            $participant = ChannelParticipantModel::factory()->create([
                $p->channel_id => $channel->id,
                $p->user_id => $channel->category->created_by_user_id,
                $p->type => ChatCategoryChannelParticipantEnum::owner->name,
            ]);
        }
        $person = PersonModel::factory()->create();
        $user = User::factory()->create([
            'name' => $person->name,
            'person_id' => $person->id,
        ]);
        ChannelParticipantModel::factory()->create([
            $p->channel_id => $channel->id,
            $p->user_id => $user->id,
            $p->type => ChatCategoryChannelParticipantEnum::admin->name,
        ]);
        $participants = $chat->participants()->whereNot('user_id', $channel->category->created_by_user_id);

        $participants->each(function (User $user) use ($channel): void {
            $p = ChannelParticipantEntityModel::props();
            ChannelParticipantModel::factory()->create([
                $p->channel_id => $channel->id,
                $p->user_id => $user->id,
                $p->type => ChatCategoryChannelParticipantEnum::default->name,
            ]);
        });
    }

    public function createChannelTopics(ChatCategoryChannelModel $channel, ChatModel $chat): void
    {
        $topic = ChatCategoryChannelTopicEntityModel::props();
        $seed_total = config('chat.SEED_CHAT_CATEGORY_CHANNELS_COUNT');
        ChatCategoryChannelTopicModel::factory()->count($seed_total)->create([
            $topic->channel_id => $channel->id,
            $topic->user_id => $chat->user_id,
        ]);
        $channel->topics()->with('channel')
            ->each(function (ChatCategoryChannelTopicModel $topic): void {
                $this->createTopicThreads($topic);
            });
    }

    public function createTopicThreads(ChatCategoryChannelTopicModel $topic): void
    {
        $topic->channel->participantUsers()
            ->each(function (User $participant) use ($topic): void {
                ThreadModel::factory()->create([
                    'parent_id' => $topic->thread_id,
                    'user_id' => $participant->id,
                ]);
            });
    }

    public function createChatGroupPermissions(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL.'Creating chat group permissions ...');
        $config = ChatConfigEntityModel::props();
        ChatConfigModel::factory()->create([$config->chat_id => $chat->id]);
        ChatPermissionModel::query()->each(function (ChatPermissionModel $permission): void {
            $p = ChatGroupPermissionEntityModel::props();
            ChatGroupPermissionModel::factory()->create([
                $p->group_id => ChatPermissionGroupModel::factory()->create()->id,
                $p->permission_id => $permission->id,
            ]);
        });
    }

    protected function createWorkspaceChat(ChatModel $chat, WorkspaceModel $firsWorkspace): void
    {
        $this->command->warn(PHP_EOL.'🤖 '.str(__METHOD__)->explode('\\')->last().' ...');

        if (collect(Module::allEnabled())->contains('Workspace')) {
            WorkspaceChatModel::factory()->for($firsWorkspace, 'workspace')->for($chat, 'chat')->create();
        }
        $this->command->info(PHP_EOL.'🤖 ✔️ '.str(__METHOD__)->explode('\\')->last().' done');
    }

    protected function createChatUsers(ChatModel $chat): void
    {
        $this->command->warn(PHP_EOL.'🤖 '.str(__METHOD__)->explode('\\')->last().' ...');

        $participants = $chat->participants();

        $participants->each(function (User $user) use ($chat): void {
            $chatUser = ChatUserEntityModel::props();
            ChatUserModel::factory()->create([
                $chatUser->user_id => $user->id,
                $chatUser->chat_id => $chat->id,
            ]);
            $permission = ChatUserPermissionEntityModel::props();
            ChatUserPermissionModel::factory()->create([
                $permission->user_id => $user->id,
                $permission->permission_id => ChatPermissionModel::query()->inRandomOrder()->first()->id,
            ]);
        });

        $this->command->info(PHP_EOL.'🤖 ✔️ '.str(__METHOD__)->explode('\\')->last().' done');
    }
}
