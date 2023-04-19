<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_channel_topic_messages', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelTopicMessageEntityModel::props(null, true);
            $table->foreignId($prop->topic_id)
                ->references('id')->on('chat_category_channel_topics')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->parent_id)
                ->nullable()
                ->references('id')->on('chat_category_channel_topic_messages')
                ->cascadeOnUpdate()->restrictOnDelete()
            ;
            $table->text($prop->message);
            $table->timestamp($prop->created_at);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_category_channel_topic_messages');
    }
};
