<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;
use Modules\Chat\Models\ChatPermissionModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method ChatPermissionModel model()
 * @method ChatPermissionEntityModel find($id)
 * @method ChatPermissionModel first()
 * @method ChatPermissionModel findOrNew($id)
 * @method ChatPermissionModel firstOrNew($query)
 * @method ChatPermissionEntityModel findOrFail($id)
 */
class ChatPermissionRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return ChatPermissionModel::class;
    }
}
