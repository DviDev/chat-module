<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatMessageUserRead\ChatMessageUserReadEntityModel;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_channel_topic_message_read_users', function (Blueprint $table) {
            $p = ChatMessageUserReadEntityModel::props(force: true);
            $table->id();
            $table->foreignId($p->message_id)->references('id')
                ->on('threads')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId($p->user_id)->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp($p->created_at);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_channel_topic_message_read_users');
    }
};
