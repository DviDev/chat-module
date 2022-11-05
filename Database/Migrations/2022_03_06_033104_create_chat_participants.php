<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatParticipantEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_participants', function (Blueprint $table) {
            $table->id();
            $prop = ChatParticipantEntityModel::props(null, true);
            $table->bigInteger($prop->chat_id);
            $table->bigInteger($prop->user_id);
            $table->enum($prop->type, ['owner', 'admin', 'default']);
            $table->timestamp($prop->created_at)->useCurrent();
            $table->timestamp($prop->updated_at)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_participants');
    }
};
