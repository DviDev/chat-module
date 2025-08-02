<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chat_category_channel_topics', function (Blueprint $table) {
            $p = ChatCategoryChannelTopicEntityModel::props(null, true);
            $table->foreignId($p->thread_id)
                ->after($p->user_id)
                ->default(1)
                ->references('id')->on('threads')
                ->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat_category_channel_topics', function (Blueprint $table) {
            $p = ChatCategoryChannelTopicEntityModel::props(null, true);
            $table->dropColumn($p->thread_id);
        });
    }
};
