<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatMessageUserRead\ChatMessageUserReadEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_channel_topic_message_read_users');
    }
};
