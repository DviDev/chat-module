<?php

namespace Modules\Chat\Entities\ChatPermission;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatPermissionModel;
use Modules\Chat\Repositories\ChatPermissionRepository;

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
 * @method ChatPermissionRepository repository()
 */
class ChatPermissionEntityModel extends BaseEntityModel
{
    use ChatPermissionProps;

    protected function repositoryClass(): string
    {
        return ChatPermissionRepository::class;
    }
}
