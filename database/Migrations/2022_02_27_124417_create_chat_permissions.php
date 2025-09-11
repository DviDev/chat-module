<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_permissions', function (Blueprint $table) {
            $table->id();
            $prop = ChatPermissionEntityModel::props(null, true);
            $table->string($prop->name, 50);
            $table->string($prop->description);
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_permissions');
    }
};
