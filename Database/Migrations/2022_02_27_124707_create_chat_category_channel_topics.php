<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_channel_topics', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelTopicEntityModel::props(null, true);
            $table->foreignId($prop->channel_id)
                ->references('id')->on('chat_category_channels')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($prop->title, 150);
            $table->string($prop->message);
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
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
        Schema::dropIfExists('chat_category_channel_topics');
    }
};
