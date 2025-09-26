<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatGroupPermission;

use Modules\Base\Contracts\BaseEntityModel;
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
final class ChatGroupPermissionEntityModel extends BaseEntityModel
{
    use ChatGroupPermissionProps;
}
