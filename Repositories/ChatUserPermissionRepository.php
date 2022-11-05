<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatUserPermissionEntityModel;
use Modules\Chat\Models\ChatUserPermissionModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatUserPermissionModel model()
 * @method ChatUserPermissionEntityModel find($id)
 * @method ChatUserPermissionModel first()
 * @method ChatUserPermissionModel findOrNew($id)
 * @method ChatUserPermissionModel firstOrNew($query)
 * @method ChatUserPermissionEntityModel findOrFail($id)
 */
class ChatUserPermissionRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatUserPermissionModel::class;
    }
}
