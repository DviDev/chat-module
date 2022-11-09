<?php

namespace Modules\Chat\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Chat\Entities\Chat\ChatEntityModel;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupEntityModel;
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

        $chat = ChatEntityModel::props();
        ChatModel::factory()->count(2)->create([
            $chat->user_id => User::query()->first()->id
        ])->each(function (ChatModel $chat) {
            $category = ChatCategoryEntityModel::props();
            ChatCategoryModel::factory()->count(3)->create([
                $category->chat_id => $chat->id,
                $category->created_by_user_id => $chat->user_id,
            ])->each(function(ChatCategoryModel $category) use ($chat) {
                $channel = ChatCategoryChannelEntityModel::props();
                ChatCategoryChannelModel::factory()->count(3)->create([
                    $channel->category_id => $category->id
                ])->each(function (ChatCategoryChannelModel $channel) use ($chat) {
                    $participant = ChatCategoryChannelParticipantEntityModel::props();
                    ChatCategoryChannelParticipantModel::factory()->create([
                        $participant->channel_id => $channel->id,
                        $participant->user_id => $channel->category->created_by_user_id
                    ]);
                    $topic = ChatCategoryChannelTopicEntityModel::props();
                    ChatCategoryChannelTopicModel::factory()->count(11)->create([
                        $topic->channel_id => $channel->id,
                        $topic->user_id => $chat->user_id
                    ])->each(function(ChatCategoryChannelTopicModel $topic) use ($channel) {
                        $message = ChatCategoryChannelTopicMessageEntityModel::props();
                        ChatCategoryChannelTopicMessageModel::factory()->create([
                            $message->user_id => $channel->category->created_by_user_id,
                            $message->topic_id => $topic->id
                        ]);
                    });
                    $user = ChatCategoryChannelUserEntityModel::props();
                    ChatCategoryChannelUserModel::factory()->create([
                        $user->user_id => $chat->id,
                        $user->channel_id => $channel->id,
                    ]);
                    $participant = ChatParticipantEntityModel::props();
                    ChatParticipantModel::factory()->create([
                        $participant->chat_id => $chat->id,
                        $participant->user_id => $chat->user_id
                    ]);
                });
            });
            $config = ChatConfigEntityModel::props();
            ChatConfigModel::factory()->create([
                $config->chat_id => $chat->id
            ]);
            ChatPermissionModel::factory()->count(11)->create()
                ->each(function(ChatPermissionModel $permission) {
                    $group = ChatPermissionGroupModel::factory()->create();
                    $p = ChatGroupPermissionEntityModel::props();
                    ChatGroupPermissionModel::factory()->create([
                        $p->group_id => $group->id,
                        $p->permission_id => $permission->id
                    ]);
                });
            $participant = ChatParticipantEntityModel::props();
            ChatParticipantModel::factory()->create([
                $participant->chat_id => $chat->id,
                $participant->user_id => $chat->user_id
            ]);

            User::query()->each(function (User $user) use ($chat) {
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
            });

        });


         $this->call(PermissionsTableSeeder::class);
        // $this->call("OthersTableSeeder");
    }
}
