<?php

namespace Modules\Chat\Entities\ChatConfig;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatConfigModel;
use Modules\Chat\Repositories\ChatConfigRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatConfigModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatConfigRepository repository()
 */
class ChatConfigEntityModel extends BaseEntityModel
{
    use ChatConfigProps;

    protected function repositoryClass(): string
    {
        return ChatConfigRepository::class;
    }
}
