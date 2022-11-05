<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryFactory;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;
use Modules\Chat\Entities\ChatCategory\ChatCategoryProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryEntityModel toEntity()
 * @method ChatCategoryFactory factory()
 */
class ChatCategoryModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryProps;

    public function modelEntity(): string
    {
        return ChatCategoryEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryFactory
    {
        return new ChatCategoryFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_categories', $alias);
    }
}
