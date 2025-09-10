<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatPermissionGroupUser\ChatPermissionGroupUserEntityModel;

return new class extends Migration
{

    public function up()
    {
        Schema::create('chat_permission_group_users', function (Blueprint $table) {
            $table->id();

            $prop = ChatPermissionGroupUserEntityModel::props(null, true);
            $table->foreignId($prop->group_id)
                ->references('id')->on('chat_permission_groups')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
        });
    }


    public function down()
    {
        Schema::dropIfExists('chat_permission_group_users');
    }
};
