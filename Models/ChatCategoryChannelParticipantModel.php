<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelParticipantFactory;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelParticipantEntityModel toEntity()
 * @method ChatCategoryChannelParticipantFactory factory()
 */
class ChatCategoryChannelParticipantModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelParticipantProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelParticipantEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryChannelParticipantFactory
    {
        return new ChatCategoryChannelParticipantFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_participants', $alias);
    }
}
