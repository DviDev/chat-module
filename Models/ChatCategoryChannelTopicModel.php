<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelTopicFactory;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read  ChatCategoryChannelModel $channel
 * @method ChatCategoryChannelTopicEntityModel toEntity()
 * @method static ChatCategoryChannelTopicFactory factory()
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

    public function channel(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryChannelModel::class, 'channel_id');
    }
}
