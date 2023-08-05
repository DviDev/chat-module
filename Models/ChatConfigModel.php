<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatConfigFactory;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;
use Modules\Chat\Entities\ChatConfig\ChatConfigProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatConfigEntityModel toEntity()
 * @method static ChatConfigFactory factory()
 */
class ChatConfigModel extends BaseModel
{
    use HasFactory;
    use ChatConfigProps;

    public function modelEntity(): string
    {
        return ChatConfigEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatConfigModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_configs', $alias);
    }
}
