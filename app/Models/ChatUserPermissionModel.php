<?php

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionEntityModel;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatUserPermissionEntityModel toEntity()
 */
class ChatUserPermissionModel extends BaseModel
{
    use ChatUserPermissionProps;

    public function modelEntity(): string
    {
        return ChatUserPermissionEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatUserPermissionModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_user_permissions', $alias);
    }
}
