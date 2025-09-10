<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;

return new class extends Migration
{

    public function up()
    {
        Schema::create('chat_users', function (Blueprint $table) {
            $table->id();

            $p = ChatUserEntityModel::props(null, true);
            $table->foreignId($p->chat_id)
                ->references('id')->on('chats')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->bigInteger($p->invite_id)->unsigned()->nullable();
            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

        });
    }


    public function down()
    {
        Schema::dropIfExists('chat_users');
    }
};
