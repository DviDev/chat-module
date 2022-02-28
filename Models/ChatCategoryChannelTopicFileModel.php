<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicFileEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicFileEntityModel toEntity()
 */
class ChatCategoryChannelTopicFileModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryChannelTopicFileEntityModel::class;
    }
}
