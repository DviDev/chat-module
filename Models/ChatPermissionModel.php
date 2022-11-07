<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatPermissionFactory;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;
use Modules\Chat\Entities\ChatPermission\ChatPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionEntityModel toEntity()
 * @method static ChatPermissionFactory factory()
 */
class ChatPermissionModel extends BaseModel
{
    use HasFactory;
    use ChatPermissionProps;

    public function modelEntity(): string
    {
        return ChatPermissionEntityModel::class;
    }

    protected static function newFactory(): ChatPermissionFactory
    {
        return new ChatPermissionFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_permissions', $alias);
    }
}
