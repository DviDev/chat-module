<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Modules\Chat\Models\ChatCategoryChannelModel;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageModel;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;
use Modules\Chat\Models\ChatCategoryModel;
use Modules\Chat\Models\ChatGroupPermissionModel;
use Modules\Chat\Models\ChatModel;
use Modules\Chat\Models\ChatPermissionGroupModel;

Route::middleware(['auth', 'verified'])->prefix('chat')->group(function () {
    Route::view('/list', 'chat::components.page.chat_list_page')->name('admin.chats');
    Route::get('/{chat}/categories', fn(ChatModel $chat) =>
        view('chat::components.page.chat_categories_page', compact('chat')))->name('admin.chat.categories');
    Route::get('/category/{category}/channels', fn(ChatCategoryModel $category) =>
        view('chat::components.page.chat_category_channel_page', compact('category')))->name('admin.chat.category.channels');
    Route::get('/category/channel/{channel}/participants', fn(ChatCategoryChannelModel $channel) =>
        view('chat::components.page.chat_category_channel_participants_page', compact('channel')))->name('admin.chat.category.channel.participants');
    Route::get('/category/channel/{channel}/topics', fn(ChatCategoryChannelModel $channel) =>
        view('chat::components.page.chat_category_channel_topics_page', compact('channel')))
        ->name('admin.chat.category.channel.topics');
    Route::get('/category/channel/topic/{topic}/files', fn(ChatCategoryChannelTopicModel $topic) =>
        view('chat::components.page.chat_category_channel_topic_files_page', compact('topic')))
        ->name('admin.chat.category.channel.topic.files');
    Route::get('/category/channel/topic/{topic}/messages', fn(ChatCategoryChannelTopicModel $topic) =>
        view('chat::components.page.chat_category_channel_topic_messages_page', compact('topic')))
        ->name('admin.chat.category.channel.topic.messages');
    Route::get('/category/channel/topic/message/{message}/files', fn(ChatCategoryChannelTopicMessageModel $message) =>
        view('chat::components.page.chat_category_channel_topic_message_files_page', compact('message')))
        ->name('admin.chat.category.channel.topic.message.files');
    Route::get('/category/channel/{channel}/users', fn(ChatCategoryChannelModel $channel) =>
        view('chat::components.page.chat_category_channel_users_page', compact('channel')))
        ->name('admin.chat.category.channel.users');
    Route::get('/category/{category}/participants', fn(ChatCategoryModel $category) =>
        view('chat::components.page.chat_category_participants_page', compact('category')))
        ->name('admin.chat.category.participants');
    Route::get('/{chat}/configs', fn(ChatModel $chat) =>
        view('chat::components.page.chat_configs_page', compact('chat')))
        ->name('admin.chat.configs');
    Route::get('/{chat}/participants', fn(ChatModel $chat) =>
        view('chat::components.page.chat_participants_page', compact('chat')))
        ->name('admin.chat.participants');
    Route::get('/{chat}/permissions', fn(ChatModel $chat) =>
        view('chat::components.page.chat_permissions_page', compact('chat')))
        ->name('admin.chat.permissions');
    Route::get('/permission/groups', fn() => view('chat::components.page.chat_permission_groups_page'))
        ->name('admin.chat.permission.groups');
    Route::get('/group/{group}/permissions', fn(ChatGroupPermissionModel $group) =>
        view('chat::components.page.chat_group_permissions_page', compact('group')))
        ->name('admin.chat.group.permissions');
    Route::get('/permission/group/{group}/users', fn(ChatPermissionGroupModel $group) =>
        view('chat::components.page.chat_permission_group_users_page', compact('group')))
        ->name('admin.chat.permission.group.users');
    Route::get('/{chat}/users', fn(ChatModel $chat) =>
        view('chat::components.page.chat_users_page', compact('chat')))
        ->name('admin.chat.users');
    Route::get('/user/{user}/permissions', fn(User $user) =>
        view('chat::components.page.chat_user_permissions_page', compact('user')))
        ->name('admin.chat.user.user.permissions');
});
