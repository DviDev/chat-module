<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatParticipantEntityModel toEntity()
 */
class ChatParticipantModel extends BaseModel
{
    use HasFactory;
    use ChatParticipantProps;

    public function modelEntity(): string
    {
        return ChatParticipantEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatParticipantModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_participants', $alias);
    }
}
