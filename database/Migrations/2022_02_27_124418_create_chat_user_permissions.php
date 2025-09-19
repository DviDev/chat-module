<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_user_permissions', function (Blueprint $table) {
            $table->id();
            $p = ChatUserPermissionEntityModel::props(null, true);
            $table->foreignId($p->user_id)
                ->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId($p->permission_id)
                ->references('id')->on('chat_permissions')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp($p->created_at)->useCurrent();
            $table->timestamp($p->updated_at)->useCurrent()->useCurrentOnUpdate();
            $table->timestamp($p->deleted_at)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_user_permissions');
    }
};
