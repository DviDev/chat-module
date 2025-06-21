<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChannelParticipant\ChannelParticipantEntityModel;
use Modules\Chat\Entities\ChannelParticipant\ChannelParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChannelParticipantEntityModel toEntity()
 *
 * @property-read ChatCategoryChannelModel $channel
 * @property-read User $user
 */
class ChannelParticipantModel extends BaseModel
{
    use ChannelParticipantProps;
    use HasFactory;

    protected $with = ['user'];

    public function modelEntity(): string
    {
        return ChannelParticipantEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChannelParticipantModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_participants', $alias);
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryChannelModel::class, 'channel_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
