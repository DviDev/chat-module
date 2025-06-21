<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;
use Modules\Chat\Models\ChatCategoryChannelUserModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method ChatCategoryChannelUserModel model()
 * @method ChatCategoryChannelUserEntityModel find($id)
 * @method ChatCategoryChannelUserModel first()
 * @method ChatCategoryChannelUserModel findOrNew($id)
 * @method ChatCategoryChannelUserModel firstOrNew($query)
 * @method ChatCategoryChannelUserEntityModel findOrFail($id)
 */
class ChatCategoryChannelUserRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return ChatCategoryChannelUserModel::class;
    }
}
