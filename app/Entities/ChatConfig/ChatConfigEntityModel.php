<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatConfig;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Chat\Models\ChatConfigModel;

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
 */
final class ChatConfigEntityModel extends BaseEntityModel
{
    use ChatConfigProps;
}
