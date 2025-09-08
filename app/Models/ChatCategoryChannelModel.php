<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatCategoryModel $category
 * @property-read User[] $participantUsers
 * @property-read ChannelParticipantModel[] $participants
 * @property-read ChatCategoryChannelTopicModel[] $topics
 *
 * @method ChatCategoryChannelEntityModel toEntity()
 */
class ChatCategoryChannelModel extends BaseModel
{
    use ChatCategoryChannelProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatCategoryChannelModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channels', $alias);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryModel::class, 'category_id');
    }

    public function participantUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChannelParticipantModel::class, 'channel_id', 'user_id');
    }

    public function participants(): HasMany
    {
        return $this->hasMany(ChannelParticipantModel::class, 'channel_id');
    }

    public function topics(): HasMany
    {
        return $this->hasMany(ChatCategoryChannelTopicModel::class, 'channel_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatCategoryChannelUserModel::class, 'channel_id', 'user_id');
    }
}
