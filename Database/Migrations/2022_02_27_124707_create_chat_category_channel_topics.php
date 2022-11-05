<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannelTopicEntityModel;

class CreateChatCategoryChannelTopics extends Migration
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
            $table->string($prop->channel_id);
            $table->string($prop->title, 150);
            $table->string($prop->message);
            $table->bigInteger($prop->user_id)->unsigned();
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
}
