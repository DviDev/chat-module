<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChannelParticipant\ChannelParticipantEntityModel;
use Modules\Chat\Entities\ChannelParticipant\ChatCategoryChannelParticipantEnum;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_category_channel_participants', function (Blueprint $table) {
            $table->id();

            $p = ChannelParticipantEntityModel::props(null, true);
            $table->foreignId($p->channel_id)->references('id')->on('chat_category_channels')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->user_id)->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->char($p->type)->default(ChatCategoryChannelParticipantEnum::default->name);

            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

            $table->unique([$p->channel_id, $p->user_id]);
        });
    }

    public function down()
    {
        Schema::dropIfExists('');
    }
};
