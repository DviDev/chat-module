<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelTopicFactory;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicEntityModel toEntity()
 * @method ChatCategoryChannelTopicFactory factory()
 */
class ChatCategoryChannelTopicModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelTopicProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelTopicEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryChannelTopicFactory
    {
        return new ChatCategoryChannelTopicFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_topics', $alias);
    }
}
