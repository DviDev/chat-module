<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatUserEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatUserEntityModel toEntity()
 */
class ChatUserModel extends BaseModel
{
    function modelEntity()
    {
        return ChatUserEntityModel::class;
    }
}
