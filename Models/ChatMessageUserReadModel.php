<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatMessageUserRead\ChatMessageUserReadEntityModel;
use Modules\Chat\Entities\ChatMessageUserRead\ChatMessageUserReadProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatMessageUserReadModel $model
 * @method ChatMessageUserReadEntityModel toEntity()
 */
class ChatMessageUserReadModel extends BaseModel
{
    use HasFactory;
    use ChatMessageUserReadProps;

    public function modelEntity(): string
    {
        return ChatMessageUserReadEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatMessageUserReadModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_channel_topic_message_read_users', $alias);
    }
}
