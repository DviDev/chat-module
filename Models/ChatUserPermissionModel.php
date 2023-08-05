<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatUserPermissionFactory;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionEntityModel;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatUserPermissionEntityModel toEntity()
 * @method static ChatUserPermissionFactory factory()
 */
class ChatUserPermissionModel extends BaseModel
{
    use HasFactory;
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
