<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageFile\ChatCategoryChannelTopicMessageFileEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_channel_topic_message_files', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelTopicMessageFileEntityModel::props(null, true);
            $table->foreignId($prop->message_id)
                ->references('id')->on('chat_category_channel_topic_messages')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($prop->path);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_category_channel_topic_message_files');
    }
};
