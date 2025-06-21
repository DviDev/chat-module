<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupEntityModel;
use Modules\Chat\Models\ChatPermissionGroupModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method ChatPermissionGroupModel model()
 * @method ChatPermissionGroupEntityModel find($id)
 * @method ChatPermissionGroupModel first()
 * @method ChatPermissionGroupModel findOrNew($id)
 * @method ChatPermissionGroupModel firstOrNew($query)
 * @method ChatPermissionGroupEntityModel findOrFail($id)
 */
class ChatPermissionGroupRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return ChatPermissionGroupModel::class;
    }
}
