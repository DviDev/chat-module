<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatPermissionEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionEntityModel toEntity()
 */
class ChatPermissionModel extends BaseModel
{
    function modelEntity()
    {
        return ChatPermissionEntityModel::class;
    }
}
