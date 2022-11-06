<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_group_permissions', function (Blueprint $table) {
            $table->id();

            $prop = ChatGroupPermissionEntityModel::props(null, true);
            $table->bigInteger($prop->group_id)->unsigned();
            $table->smallInteger($prop->permission_id)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_group_permissions');
    }
};
