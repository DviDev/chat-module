<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicEntityModel toEntity()
 */
class ChatCategoryChannelTopicModel extends BaseModel
{
    function modelEntity(): string
    {
        return ChatCategoryChannelTopicEntityModel::class;
    }
}

