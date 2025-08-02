<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupEntityModel;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatPermissionGroupEntityModel toEntity()
 */
class ChatPermissionGroupModel extends BaseModel
{
    use ChatPermissionGroupProps;
    use HasFactory;

    public function modelEntity(): string
    {
        return ChatPermissionGroupEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatPermissionGroupModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_permission_groups', $alias);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(ChatPermissionModel::class, ChatGroupPermissionModel::class, 'group_id', 'permission_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatPermissionGroupUserModel::class, 'group_id', 'user_id');
    }
}
