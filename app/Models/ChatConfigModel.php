<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseFactory;
use Modules\Base\Contracts\BaseModel;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;
use Modules\Chat\Entities\ChatConfig\ChatConfigProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatConfigEntityModel toEntity()
 */
final class ChatConfigModel extends BaseModel
{
    use ChatConfigProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_configs', $alias);
    }

    public function modelEntity(): string
    {
        return ChatConfigEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatConfigModel::class;
        };
    }
}
