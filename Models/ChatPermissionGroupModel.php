<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatPermissionGroupFactory;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupEntityModel;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionGroupEntityModel toEntity()
 * @method ChatPermissionGroupFactory factory()
 */
class ChatPermissionGroupModel extends BaseModel
{
    use HasFactory;
    use ChatPermissionGroupProps;

    public function modelEntity(): string
    {
        return ChatPermissionGroupEntityModel::class;
    }

    protected static function newFactory(): ChatPermissionGroupFactory
    {
        return new ChatPermissionGroupFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_permission_groups', $alias);
    }
}
