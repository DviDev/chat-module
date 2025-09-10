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

use Illuminate\Support\Facades\Route;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;
use Modules\Project\Services\DynamicRoutes;

DynamicRoutes::all('Chat');

Route::middleware(['auth', 'verified'])->prefix('chat')->group(function () {
    Route::get('/category/channel/topic/{topic}/messages', fn (ChatCategoryChannelTopicModel $topic) => view('chat::components.page.chat_category_channel_topic_messages_page', compact('topic')))
        ->withTrashed()
        ->name('admin.chat.category.channel.topic.messages');

});
