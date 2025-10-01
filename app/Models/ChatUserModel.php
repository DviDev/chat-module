<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseFactory;
use Modules\Base\Contracts\BaseModel;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;
use Modules\Chat\Entities\ChatUser\ChatUserProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatUserEntityModel toEntity()
 */
final class ChatUserModel extends BaseModel
{
    use ChatUserProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_users', $alias);
    }

    public function modelEntity(): string
    {
        return ChatUserEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatUserModel::class;
        };
    }
}
