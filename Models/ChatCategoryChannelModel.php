<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelFactory;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatCategoryModel $category
 * @property-read ChatCategoryChannelParticipantModel[] $participants
 * @property-read ChatCategoryChannelTopicModel[] $topics
 * @method ChatCategoryChannelEntityModel toEntity()
 * @method static ChatCategoryChannelFactory factory()
 */
class ChatCategoryChannelModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryChannelFactory
    {
        return new ChatCategoryChannelFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channels', $alias);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryModel::class, 'category_id');
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatCategoryChannelParticipantModel::class, 'channel_id');
    }

    public function topics(): HasMany
    {
        return $this->hasMany(ChatCategoryChannelTopicModel::class, 'channel_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatCategoryChannelUserModel::class, 'user_id', 'channel_id');
    }

}
