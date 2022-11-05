<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelParticipantEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelParticipantEntityModel toEntity()
 */
class ChatCategoryChannelParticipantModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryChannelParticipantEntityModel::class;
    }

    public static function table($alias = null): string
    {
        return parent::dbTable('chat_category_channel_participants', $alias);
    }
}
