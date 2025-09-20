<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatPermissionGroup;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatPermissionGroupModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatPermissionGroupModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class ChatPermissionGroupEntityModel extends BaseEntityModel
{
    use ChatPermissionGroupProps;
}
