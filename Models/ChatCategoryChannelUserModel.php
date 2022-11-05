<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelUserFactory;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelUserEntityModel toEntity()
 * @method ChatCategoryChannelUserFactory factory()
 */
class ChatCategoryChannelUserModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelUserProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelUserEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryChannelUserFactory
    {
        return new ChatCategoryChannelUserFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_users', $alias);
    }
}
