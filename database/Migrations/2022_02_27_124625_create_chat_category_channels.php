<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_category_channels', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelEntityModel::props(null, true);
            $table->foreignId($prop->category_id)
                ->references('id')->on('chat_categories')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string($prop->name);
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_category_channels');
    }
};
