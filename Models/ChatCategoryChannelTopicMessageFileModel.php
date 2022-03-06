<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageFileEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicMessageFileEntityModel toEntity()
 */
class ChatCategoryChannelTopicMessageFileModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryChannelTopicMessageFileEntityModel::class;
    }
}

