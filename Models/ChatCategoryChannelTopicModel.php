<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Factories\BaseFactory;
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

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_topics', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatCategoryChannelTopicModel::class;
        };
    }

    public function modelEntity(): string
    {
        return ChatCategoryChannelTopicEntityModel::class;
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryChannelModel::class, 'channel_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(ChatCategoryChannelTopicFileModel::class, 'topic_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatCategoryChannelTopicMessageModel::class, 'topic_id');
    }
}
