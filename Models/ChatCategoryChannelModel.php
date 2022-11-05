<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelFactory;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelEntityModel toEntity()
 * @method ChatCategoryChannelFactory factory()
 */
class ChatCategoryChannelModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryChannelFactory
    {
        return new ChatCategoryChannelFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channels', $alias);
    }
}
