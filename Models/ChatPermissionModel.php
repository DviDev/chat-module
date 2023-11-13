<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;
use Modules\Chat\Entities\ChatPermission\ChatPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionEntityModel toEntity()
 */
class ChatPermissionModel extends BaseModel
{
    use HasFactory;
    use ChatPermissionProps;

    public function modelEntity(): string
    {
        return ChatPermissionEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatPermissionModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_permissions', $alias);
    }
}
