<?php

namespace Modules\Chat\Entities\ChatGroupPermission;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatGroupPermissionModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatGroupPermissionModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ChatGroupPermissionEntityModel extends BaseEntityModel
{
    use ChatGroupPermissionProps;
}
