<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatPermissionGroupEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionGroupEntityModel toEntity()
 */
class ChatPermissionGroupModel extends BaseModel
{
    function modelEntity()
    {
        return ChatPermissionGroupEntityModel::class;
    }
}
