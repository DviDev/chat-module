<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatPermission;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatPermissionModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatPermissionModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class ChatPermissionEntityModel extends BaseEntityModel
{
    use ChatPermissionProps;
}
