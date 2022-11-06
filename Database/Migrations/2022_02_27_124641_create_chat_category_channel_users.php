<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_channel_users', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryChannelUserEntityModel::props(null, true);
            $table->bigInteger($prop->channel_id)->unsigned();
            $table->bigInteger($prop->user_id)->unsigned();
            $table->timestamp($prop->created_at);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_category_channel_users');
    }
};
