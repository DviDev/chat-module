<?php

namespace Modules\Chat\Entities\ChatConfig;

use Modules\Base\Entities\BaseEntityModel;
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
class ChatConfigEntityModel extends BaseEntityModel
{
    use ChatConfigProps;
}
