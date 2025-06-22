<?php

namespace Modules\Chat\Entities\ChatCategory;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatCategoryModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatCategoryModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ChatCategoryEntityModel extends BaseEntityModel
{
    use ChatCategoryProps;
}
