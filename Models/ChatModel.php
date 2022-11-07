<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatFactory;
use Modules\Chat\Entities\Chat\ChatEntityModel;
use Modules\Chat\Entities\Chat\ChatProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatEntityModel toEntity()
 * @method static ChatFactory factory()
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
}
