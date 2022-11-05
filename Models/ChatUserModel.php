<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatUserFactory;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;
use Modules\Chat\Entities\ChatUser\ChatUserProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatUserEntityModel toEntity()
 * @method ChatUserFactory factory()
 */
class ChatUserModel extends BaseModel
{
    use HasFactory;
    use ChatUserProps;

    public function modelEntity(): string
    {
        return ChatUserEntityModel::class;
    }

    protected static function newFactory(): ChatUserFactory
    {
        return new ChatUserFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_users', $alias);
    }
}
