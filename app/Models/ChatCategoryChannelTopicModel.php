<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicProps;
use Modules\Post\Models\ThreadModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read  ChatCategoryChannelModel $channel
 * @property-read  User $user
 * @property-read  ThreadModel $thread
 * @property-read  ThreadModel[]|Collection $threads
 *
 * @method ChatCategoryChannelTopicEntityModel toEntity()
 */
class ChatCategoryChannelTopicModel extends BaseModel
{
    use ChatCategoryChannelTopicProps;
    use SoftDeletes;

    protected $casts = ['created_at' => 'datetime'];

    protected $with = ['thread'];

    protected static function boot()
    {
        parent::boot();

        self::creating(function (self $topic) {
            $topic->thread_id = ThreadModel::query()->create([
                'content' => $topic->title,
                'user_id' => $topic->user_id,
            ])->id;
        });
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_topics', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread(): BelongsTo
    {
        return $this->belongsTo(ThreadModel::class, 'thread_id');
    }

    public function threads(): HasMany
    {
        return $this->hasMany(ThreadModel::class, 'parent_id');
    }
}
