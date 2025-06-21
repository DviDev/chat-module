<?php

namespace Modules\Chat\Entities\ChatPermissionGroup;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatPermissionGroupModel;
use Modules\Chat\Repositories\ChatPermissionGroupRepository;

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
 * @method ChatPermissionGroupRepository repository()
 */
class ChatPermissionGroupEntityModel extends BaseEntityModel
{
    use ChatPermissionGroupProps;

    protected function repositoryClass(): string
    {
        return ChatPermissionGroupRepository::class;
    }
}
