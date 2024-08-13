<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read  User $user
 * @property-read  ChatCategoryChannelTopicModel $topic
 * @property-read  ChatCategoryChannelTopicMessageModel $parent
 * @method ChatCategoryChannelTopicMessageEntityModel toEntity()
 */
class ChatCategoryChannelTopicMessageModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelTopicMessageProps;

    protected $with = ['user'];

    protected $casts = ['created_at' => 'datetime'];

    public function modelEntity(): string
    {
        return ChatCategoryChannelTopicMessageEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatCategoryChannelTopicMessageModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_topic_messages', $alias);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryChannelTopicModel::class, 'topic_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(ChatCategoryChannelTopicMessageFileModel::class, 'message_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
