<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;

return new class extends Migration
{

    public function up()
    {
        Schema::create('chat_configs', function (Blueprint $table) {
            $table->id();

            $prop = ChatConfigEntityModel::props(null, true);
            $table->foreignId($prop->chat_id)
                ->references('id')->on('chats')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->tinyInteger($prop->time_between_messages)->unsigned();
        });
    }


    public function down()
    {
        Schema::dropIfExists('chat_configs');
    }
};
