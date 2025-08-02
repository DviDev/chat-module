<?php

namespace Modules\Chat\Entities\ChatPermissionGroupUser;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatPermissionGroupUserModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatPermissionGroupUserModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ChatPermissionGroupUserEntityModel extends BaseEntityModel
{
    use ChatPermissionGroupUserProps;
}
