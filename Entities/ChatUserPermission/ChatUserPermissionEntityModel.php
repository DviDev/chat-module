<?php

namespace Modules\Chat\Entities\ChatUserPermission;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatUserPermissionRepository;
use Modules\Chat\Models\ChatUserPermissionModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatUserPermissionModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatUserPermissionRepository repository()
 */
class ChatUserPermissionEntityModel extends BaseEntityModel
{
    use ChatUserPermissionProps;

    protected function repositoryClass(): string
    {
        return ChatUserPermissionRepository::class;
    }
}
