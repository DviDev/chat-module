<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;
use Modules\Chat\Entities\ChatUser\ChatUserProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatUserEntityModel toEntity()
 */
class ChatUserModel extends BaseModel
{
    use HasFactory;
    use ChatUserProps;

    public function modelEntity(): string
    {
        return ChatUserEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatUserModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_users', $alias);
    }
}
