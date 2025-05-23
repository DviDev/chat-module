<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatPermissionGroupUser\ChatPermissionGroupUserEntityModel;
use Modules\Chat\Entities\ChatPermissionGroupUser\ChatPermissionGroupUserProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionGroupUserEntityModel toEntity()
 */
class ChatPermissionGroupUserModel extends BaseModel
{
    use HasFactory;
    use ChatPermissionGroupUserProps;

    public function modelEntity(): string
    {
        return ChatPermissionGroupUserEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatPermissionGroupUserModel::class;
        };
    }
    public static function table($alias = null): string
    {
        return self::dbTable('chat_permission_group_users', $alias);
    }
}
