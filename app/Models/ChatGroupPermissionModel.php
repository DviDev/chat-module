<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatGroupPermissionEntityModel toEntity()
 */
final class ChatGroupPermissionModel extends BaseModel
{
    use ChatGroupPermissionProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_group_permissions', $alias);
    }

    public function modelEntity(): string
    {
        return ChatGroupPermissionEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatGroupPermissionModel::class;
        };
    }
}
