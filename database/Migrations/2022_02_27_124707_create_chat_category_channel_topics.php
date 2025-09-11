<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_category_channel_topics', function (Blueprint $table) {
            $table->id();

            $p = ChatCategoryChannelTopicEntityModel::props(null, true);
            $table->foreignId($p->channel_id)
                ->references('id')->on('chat_category_channels')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->string($p->title);
            $table->string($p->message)->nullable();

            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

            $table->unique([$p->channel_id, $p->title]);

        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_category_channel_topics');
    }
};
