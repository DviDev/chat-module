<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatParticipantEntityModel toEntity()
 */
class ChatParticipantModel extends BaseModel
{
    use ChatParticipantProps;
    use HasFactory;

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

    public static function table($alias = null): string
    {
        return self::dbTable('chat_participants', $alias);
    }
}
