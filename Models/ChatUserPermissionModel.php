<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatUserPermissionEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatUserPermissionEntityModel toEntity()
 */
class ChatUserPermissionModel extends BaseModel
{
    function modelEntity()
    {
        return ChatUserPermissionEntityModel::class;
    }

    public static function table($alias = null): string
    {
        return parent::dbTable('chat_user_permissions', $alias);
    }
}
