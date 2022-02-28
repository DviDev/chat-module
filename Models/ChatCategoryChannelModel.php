<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @copyright Copyright (c) 2022.
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelEntityModel toEntity()
 */
class ChatCategoryChannelModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryChannelEntityModel::class;
    }
}
