<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_categories', function (Blueprint $table) {
            $table->id();

            $p = ChatCategoryEntityModel::props(null, true);
            $table->foreignId($p->chat_id)->references('id')->on('chats')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->created_by_user_id)->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($p->name, 50);
            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_categories');
    }
};
