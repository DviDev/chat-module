<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;
use Modules\Chat\Entities\ChatPermission\ChatPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatPermissionEntityModel toEntity()
 */
final class ChatPermissionModel extends BaseModel
{
    use ChatPermissionProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_permissions', $alias);
    }

    public function modelEntity(): string
    {
        return ChatPermissionEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatPermissionModel::class;
        };
    }
}
