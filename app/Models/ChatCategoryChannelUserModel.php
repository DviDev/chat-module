<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatCategoryChannelUserEntityModel toEntity()
 */
final class ChatCategoryChannelUserModel extends BaseModel
{
    use ChatCategoryChannelUserProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_users', $alias);
    }

    public function modelEntity(): string
    {
        return ChatCategoryChannelUserEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatCategoryChannelUserModel::class;
        };
    }
}
