<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatMessageUserRead\ChatMessageUserReadEntityModel;
use Modules\Chat\Entities\ChatMessageUserRead\ChatMessageUserReadProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatMessageUserReadModel $model
 *
 * @method ChatMessageUserReadEntityModel toEntity()
 */
final class ChatMessageUserReadModel extends BaseModel
{
    use ChatMessageUserReadProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_channel_topic_message_read_users', $alias);
    }

    public function modelEntity(): string
    {
        return ChatMessageUserReadEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatMessageUserReadModel::class;
        };
    }
}
