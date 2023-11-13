<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\Chat\ChatEntityModel;
use Modules\Chat\Models\ChatModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatModel model()
 * @method ChatEntityModel find($id)
 * @method ChatModel first()
 * @method ChatModel findOrNew($id)
 * @method ChatModel firstOrNew($query)
 * @method ChatEntityModel findOrFail($id)
 */
class ChatRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatModel::class;
    }
}
