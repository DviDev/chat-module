<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;
use Modules\Chat\Entities\ChatCategory\ChatCategoryProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read  ChatModel $chat
 * @property-read  ChatCategoryChannelModel[] $channels
 *
 * @method ChatCategoryEntityModel toEntity()
 */
final class ChatCategoryModel extends BaseModel
{
    use ChatCategoryProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_categories', $alias);
    }

    public function modelEntity(): string
    {
        return ChatCategoryEntityModel::class;
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(ChatModel::class, 'chat_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function channels(): HasMany
    {
        return $this->hasMany(ChatCategoryChannelModel::class, 'category_id');
    }

    public function firstChannel(): ChatCategoryChannelModel|HasMany|null
    {
        return $this->channels()->first();
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, ChatCategoryParticipantModel::class, 'category_id', 'participant_id');
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatCategoryModel::class;
        };
    }
}
