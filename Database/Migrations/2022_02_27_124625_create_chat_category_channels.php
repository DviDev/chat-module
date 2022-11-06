<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_channels', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelEntityModel::props(null, true);
            $table->bigInteger($prop->category_id)->unsigned();
            $table->string($prop->name);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_category_channels');
    }
};
