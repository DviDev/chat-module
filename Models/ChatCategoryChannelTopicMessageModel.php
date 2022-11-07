<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelTopicMessageFactory;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicMessageEntityModel toEntity()
 * @method static ChatCategoryChannelTopicMessageFactory factory()
 */
class ChatCategoryChannelTopicMessageModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelTopicMessageProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelTopicMessageEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryChannelTopicMessageFactory
    {
        return new ChatCategoryChannelTopicMessageFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_topic_messages', $alias);
    }
}
