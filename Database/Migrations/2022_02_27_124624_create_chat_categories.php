<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_categories', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryEntityModel::props(null, true);
            $table->foreignId($prop->chat_id)
                ->references('id')->on('chat_categories')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($prop->name, 50);
            $table->timestamp($prop->created_at);
            $table->foreignId($prop->created_by_user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_categories');
    }
};
