<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_configs', function (Blueprint $table) {
            $table->id();

            $prop = ChatConfigEntityModel::props(null, true);
            $table->bigInteger($prop->chat_id)->unsigned();
            $table->tinyInteger($prop->time_between_messages)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_configs');
    }
};
