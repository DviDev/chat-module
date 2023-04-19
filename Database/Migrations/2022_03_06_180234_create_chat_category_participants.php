<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_participants', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryParticipantEntityModel::props(null, true);
            $table->foreignId($prop->category_id)
                ->references('id')->on('chat_categories')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->enum($prop->type, ChatCategoryParticipantEnum::toArray());
            $table->timestamp($prop->created_at);
            $table->timestamp($prop->updated_at)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_category_participants');
    }
};
