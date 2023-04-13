<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_channel_participants', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelParticipantEntityModel::props(null, true);
            $table->foreignId($prop->channel_id)->references('id')->on('chat_category_channels')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->user_id)->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->enum($prop->type, ChatCategoryChannelParticipantEnum::toArray());
            $table->timestamp($prop->created_at);
            $table->timestamp($prop->updated_at)->nullable();

            $table->unique([$prop->channel_id, $prop->user_id]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
};
