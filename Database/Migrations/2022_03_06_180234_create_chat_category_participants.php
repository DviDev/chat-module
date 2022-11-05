<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_category_participants', function (Blueprint $table) {
            $table->id();

            $prop = ChatCategoryParticipantEntityModel::props(null, true);
            $table->bigInteger($prop->category_id);
            $table->bigInteger($prop->user_id);
            $table->enum($prop->type, ['owner', 'admin', 'default']);
            $table->timestamp($prop->created_at);
            $table->timestamp($prop->updated_at)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_category_participants');
    }
};
