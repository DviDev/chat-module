<?php

namespace Modules\Chat\Entities\ChatGroupPermission;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatGroupPermissionModel;
use Modules\Chat\Repositories\ChatGroupPermissionRepository;

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
 * @method ChatGroupPermissionRepository repository()
 */
class ChatGroupPermissionEntityModel extends BaseEntityModel
{
    use ChatGroupPermissionProps;

    protected function repositoryClass(): string
    {
        return ChatGroupPermissionRepository::class;
    }
}
