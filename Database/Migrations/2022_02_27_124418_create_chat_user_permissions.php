<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatUserPermissionEntityModel;

class CreateChatUserPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_user_permissions', function (Blueprint $table) {
            $table->id();
            $prop = ChatUserPermissionEntityModel::props(null, true);
            $table->bigInteger($prop->user_id)->unsigned();
            $table->bigInteger($prop->permission_id)->unsigned();
            $table->timestamp($prop->created_at)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_user_permissions');
    }
}
