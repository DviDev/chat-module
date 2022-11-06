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
            $table->bigInteger($prop->topic_id)->unsigned();
            $table->bigInteger($prop->user_id)->unsigned();
            $table->bigInteger($prop->parent_id)->unsigned();
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
