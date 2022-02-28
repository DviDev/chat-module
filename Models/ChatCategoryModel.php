<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryEntityModel toEntity()
 */
class ChatCategoryModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryEntityModel::class;
    }
}
