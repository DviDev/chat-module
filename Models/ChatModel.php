<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatEntityModel toEntity()
 */
class ChatModel extends BaseModel
{
    function modelEntity()
    {
        return ChatEntityModel::class;
    }

    public static function table($alias = null): string
    {
        return parent::dbTable('chats', $alias);
    }
}
