<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatPermissionGroupUser\ChatPermissionGroupUserEntityModel;
use Modules\Chat\Models\ChatPermissionGroupUserModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatPermissionGroupUserModel model()
 * @method ChatPermissionGroupUserEntityModel find($id)
 * @method ChatPermissionGroupUserModel first()
 * @method ChatPermissionGroupUserModel findOrNew($id)
 * @method ChatPermissionGroupUserModel firstOrNew($query)
 * @method ChatPermissionGroupUserEntityModel findOrFail($id)
 */
class ChatPermissionGroupUserRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatPermissionGroupUserModel::class;
    }
}
