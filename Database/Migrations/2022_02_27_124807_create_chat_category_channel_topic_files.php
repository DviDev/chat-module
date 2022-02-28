<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannelTopicFileEntityModel;

class CreateChatCategoryChannelTopicFiles extends Migration
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
            $table->bigInteger($prop->topic_id)->unsigned();
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
}
