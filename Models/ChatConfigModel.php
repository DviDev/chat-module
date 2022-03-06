<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatConfigEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatConfigEntityModel toEntity()
 */
class ChatConfigModel extends BaseModel
{
    function modelEntity()
    {
        return ChatConfigEntityModel::class;
    }
}
