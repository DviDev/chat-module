<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatPermissionGroupUserEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionGroupUserEntityModel toEntity()
 */
class ChatPermissionGroupUserModel extends BaseModel
{
    function modelEntity()
    {
        return ChatPermissionGroupUserEntityModel::class;
    }
}
