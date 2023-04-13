<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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

            $p = ChatCategoryChannelUserEntityModel::props(null, true);
            $table->bigInteger($p->channel_id)->unsigned();
            $table->bigInteger($p->user_id)->unsigned();
            $table->timestamp($p->created_at);

            $table->unique([$p->channel_id, $p->user_id]);
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
