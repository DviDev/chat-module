<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatUserPermission;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Chat\Models\ChatUserPermissionModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatUserPermissionModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class ChatUserPermissionEntityModel extends BaseEntityModel
{
    use ChatUserPermissionProps;
}
