<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryParticipantEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryParticipantEntityModel toEntity()
 */
class ChatCategoryParticipantModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryParticipantEntityModel::class;
    }

    public static function table($alias = null): string
    {
        return parent::dbTable('chat_category_participants', $alias);
    }
}
