<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;
use Modules\Chat\Models\ChatGroupPermissionModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method ChatGroupPermissionModel model()
 * @method ChatGroupPermissionEntityModel find($id)
 * @method ChatGroupPermissionModel first()
 * @method ChatGroupPermissionModel findOrNew($id)
 * @method ChatGroupPermissionModel firstOrNew($query)
 * @method ChatGroupPermissionEntityModel findOrFail($id)
 */
class ChatGroupPermissionRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return ChatGroupPermissionModel::class;
    }
}
