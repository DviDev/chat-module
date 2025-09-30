<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\BaseFactory;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatParticipantEntityModel toEntity()
 */
final class ChatParticipantModel extends BaseModel
{
    use ChatParticipantProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_participants', $alias);
    }

    public function modelEntity(): string
    {
        return ChatParticipantEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatParticipantModel::class;
        };
    }
}
