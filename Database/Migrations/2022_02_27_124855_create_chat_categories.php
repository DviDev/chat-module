<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;

class CreateChatCategories extends Migration
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
            $table->bigInteger($prop->chat_id)->unsigned();
            $table->string($prop->name, 50);
            $table->timestamp($prop->created_at);
            $table->bigInteger($prop->created_by_user_id)->unsigned();
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
}
