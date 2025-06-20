<?php

namespace Modules\Chat\Entities\ChatPermissionGroupUser;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatPermissionGroupUserModel;
use Modules\Chat\Repositories\ChatPermissionGroupUserRepository;

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
 * @method ChatPermissionGroupUserRepository repository()
 */
class ChatPermissionGroupUserEntityModel extends BaseEntityModel
{
    use ChatPermissionGroupUserProps;

    protected function repositoryClass(): string
    {
        return ChatPermissionGroupUserRepository::class;
    }
}
