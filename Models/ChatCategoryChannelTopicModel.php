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

    public static function table($alias = null): string
    {
        return parent::dbTable('chat_category_channel_topics', $alias);
    }
}
