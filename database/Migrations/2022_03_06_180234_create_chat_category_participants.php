<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;

return new class extends Migration
{

    public function up()
    {
        Schema::create('chat_category_participants', function (Blueprint $table) {
            $table->id();

            $p = ChatCategoryParticipantEntityModel::props(null, true);
            $table->foreignId($p->category_id)
                ->references('id')->on('chat_categories')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->char($p->type); // ChatCategoryParticipantEnum::toArray()
            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

        });
    }


    public function down()
    {
        Schema::dropIfExists('chat_category_participants');
    }
};
