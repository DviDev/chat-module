<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;
use Modules\Chat\Models\ChatUserModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method ChatUserModel model()
 * @method ChatUserEntityModel find($id)
 * @method ChatUserModel first()
 * @method ChatUserModel findOrNew($id)
 * @method ChatUserModel firstOrNew($query)
 * @method ChatUserEntityModel findOrFail($id)
 */
class ChatUserRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return ChatUserModel::class;
    }
}
