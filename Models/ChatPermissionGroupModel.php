<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatPermissionGroupFactory;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupEntityModel;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatPermissionGroupEntityModel toEntity()
 * @method static ChatPermissionGroupFactory factory()
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

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(ChatPermissionModel::class, ChatGroupPermissionModel::class, 'group_id', 'permission_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatPermissionGroupUserModel::class, 'group_id', 'user_id');
    }
}
