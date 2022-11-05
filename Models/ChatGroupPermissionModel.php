<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatGroupPermissionFactory;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatGroupPermissionEntityModel toEntity()
 * @method ChatGroupPermissionFactory factory()
 */
class ChatGroupPermissionModel extends BaseModel
{
    use HasFactory;
    use ChatGroupPermissionProps;

    public function modelEntity(): string
    {
        return ChatGroupPermissionEntityModel::class;
    }

    protected static function newFactory(): ChatGroupPermissionFactory
    {
        return new ChatGroupPermissionFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_group_permissions', $alias);
    }
}
