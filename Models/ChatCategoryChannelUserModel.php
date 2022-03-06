<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelUserEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelUserEntityModel toEntity()
 */
class ChatCategoryChannelUserModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryChannelUserEntityModel::class;
    }
}
