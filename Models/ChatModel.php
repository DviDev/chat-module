<?php

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatFactory;
use Modules\Chat\Entities\Chat\ChatEntityModel;
use Modules\Chat\Entities\Chat\ChatProps;
use Modules\Workspace\Models\WorkspaceChatModel;
use Modules\Workspace\Models\WorkspaceModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read  User $user
 * @property-read  User[] $participants
 * @property-read  WorkspaceModel[] $workspaces
 * @method ChatEntityModel toEntity()
 * @method static ChatFactory factory()
 * @property-read  ChatCategoryModel[] $categories
 */
class ChatModel extends BaseModel
{
    use HasFactory;
    use ChatProps;

    public function modelEntity(): string
    {
        return ChatEntityModel::class;
    }

    protected static function newFactory(): ChatFactory
    {
        return new ChatFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chats', $alias);
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

    public function configs(): HasMany
    {
        return $this->hasMany(ChatConfigModel::class, 'chat_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatUserModel::class, 'chat_id', 'user_id');
    }
}
