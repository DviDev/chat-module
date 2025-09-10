<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupEntityModel;

return new class extends Migration
{

    public function up()
    {
        Schema::create('chat_permission_groups', function (Blueprint $table) {
            $table->id();
            $prop = ChatPermissionGroupEntityModel::props(null, true);
            $table->string($prop->name, 50);
            $table->string($prop->description)->nullable();
        });
    }


    public function down()
    {
        Schema::dropIfExists('chat_permission_groups');
    }
};
