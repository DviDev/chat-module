<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_participants', function (Blueprint $table): void {
            $table->id();
            $p = ChatParticipantEntityModel::props(null, true);
            $table->foreignId($p->chat_id)
                ->references('id')->on('chats')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->char($p->type); // ChatParticipantEnum::toArray()
            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_participants');
    }
};
