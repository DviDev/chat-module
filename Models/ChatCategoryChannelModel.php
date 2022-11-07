<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelFactory;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatCategoryModel $category
 * @method ChatCategoryChannelEntityModel toEntity()
 * @method static ChatCategoryChannelFactory factory()
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(ChatCategoryModel::class, 'category_id');
    }
}
