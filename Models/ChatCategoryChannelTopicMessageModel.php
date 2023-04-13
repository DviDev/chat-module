<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelTopicMessageFactory;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read  User $user
 * @property-read  ChatCategoryChannelTopicModel $topic
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryChannelTopicModel::class, 'topic_id');
    }
}
