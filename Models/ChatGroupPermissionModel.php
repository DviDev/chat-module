<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatGroupPermissionEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatGroupPermissionEntityModel toEntity()
 */
class ChatGroupPermissionModel extends BaseModel
{
    function modelEntity()
    {
        return ChatGroupPermissionEntityModel::class;
    }

    public static function table($alias = null): string
    {
        return parent::dbTable('chat_group_permissions', $alias);
    }
}
