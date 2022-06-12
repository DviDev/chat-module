<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicMessageEntityModel toEntity()
 */
class ChatCategoryChannelTopicMessageModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCategoryChannelTopicMessageEntityModel::class;
    }

    public static function table($alias = null): string
    {
        return parent::dbTable('chat_category_channel_topic_messages', $alias);
    }
}
