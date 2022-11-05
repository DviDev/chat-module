<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatPermissionEntityModel;

class CreateChatPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_permissions', function (Blueprint $table) {
            $table->id();
            $prop = ChatPermissionEntityModel::props(null, true);
            $table->string($prop->name, 50);
            $table->string($prop->description);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_permissions');
    }
}
