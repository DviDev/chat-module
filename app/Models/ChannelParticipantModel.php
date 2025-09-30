<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\BaseFactory;
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
final class ChannelParticipantModel extends BaseModel
{
    use ChannelParticipantProps;

    protected $with = ['user'];

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_participants', $alias);
    }

    public function modelEntity(): string
    {
        return ChannelParticipantEntityModel::class;
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryChannelModel::class, 'channel_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChannelParticipantModel::class;
        };
    }
}
