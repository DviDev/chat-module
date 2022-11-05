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

    public static function table($alias = null): string
    {
        return parent::dbTable('chat_category_channel_topic_files', $alias);
    }
}
