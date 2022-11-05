<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatPermissionGroupUser\ChatPermissionGroupUserEntityModel;

class CreateChatPermissionGroupUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_permission_group_users', function (Blueprint $table) {
            $table->id();

            $prop = ChatPermissionGroupUserEntityModel::props(null, true);
            $table->bigInteger($prop->group_id)->unsigned();
            $table->bigInteger($prop->user_id)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_permission_group_users');
    }
}
