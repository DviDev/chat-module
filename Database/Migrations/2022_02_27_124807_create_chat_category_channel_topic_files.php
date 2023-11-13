<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannelTopicFile\ChatCategoryChannelTopicFileEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_channel_topic_files', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelTopicFileEntityModel::props(null, true);
            $table->foreignId($prop->topic_id)
                ->references('id')->on('chat_category_channel_topics')
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
        Schema::dropIfExists('chat_category_channel_topic_files');
    }
};
