<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatGroupPermissionEntityModel toEntity()
 */
class ChatGroupPermissionModel extends BaseModel
{
    use HasFactory;
    use ChatGroupPermissionProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_group_permissions', $alias);
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatGroupPermissionModel::class;
        };
    }

    public function modelEntity(): string
    {
        return ChatGroupPermissionEntityModel::class;
    }
}
