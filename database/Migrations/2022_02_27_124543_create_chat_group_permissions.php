<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_group_permissions', function (Blueprint $table) {
            $table->id();

            $prop = ChatGroupPermissionEntityModel::props(null, true);
            $table->foreignId($prop->group_id)
                ->references('id')->on('chat_permission_groups')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($prop->permission_id)
                ->references('id')->on('chat_permissions')
                ->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_group_permissions');
    }
};
