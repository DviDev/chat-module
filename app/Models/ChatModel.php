<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\Chat\ChatEntityModel;
use Modules\Chat\Entities\Chat\ChatProps;
use Modules\Person\Models\Relations\BelongsToUser;
use Modules\Workspace\Models\WorkspaceChatModel;
use Modules\Workspace\Models\WorkspaceModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read  User $user
 * @property-read  User[] $participants
 * @property-read  WorkspaceModel[] $workspaces
 *
 * @method ChatEntityModel toEntity()
 *
 * @property-read  ChatCategoryModel[] $categories
 */
final class ChatModel extends BaseModel
{
    use BelongsToUser;
    use ChatProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chats', $alias);
    }

    public function modelEntity(): string
    {
        return ChatEntityModel::class;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatParticipantModel::class, 'chat_id', 'user_id');
    }

    public function workspaces(): BelongsToMany
    {
        return $this->belongsToMany(WorkspaceModel::class, WorkspaceChatModel::class, 'chat_id', 'workspace_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(ChatCategoryModel::class, 'chat_id');
    }

    public function firstCategory(): ChatCategoryModel|HasMany|null
    {
        return $this->categories()->first();
    }

    public function configs(): HasMany
    {
        return $this->hasMany(ChatConfigModel::class, 'chat_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatUserModel::class, 'chat_id', 'user_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatModel::class;
        };
    }
}
