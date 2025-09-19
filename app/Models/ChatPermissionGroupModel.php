<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use App\Models\User;
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
final class ChatPermissionGroupModel extends BaseModel
{
    use ChatPermissionGroupProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_permission_groups', $alias);
    }

    public function modelEntity(): string
    {
        return ChatPermissionGroupEntityModel::class;
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(ChatPermissionModel::class, ChatGroupPermissionModel::class, 'group_id', 'permission_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatPermissionGroupUserModel::class, 'group_id', 'user_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatPermissionGroupModel::class;
        };
    }
}
