<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;
use Modules\Chat\Models\ChatCategoryModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method self obj()
 * @method ChatCategoryModel model()
 * @method ChatCategoryEntityModel find($id)
 * @method ChatCategoryModel first()
 * @method ChatCategoryModel findOrNew($id)
 * @method ChatCategoryModel firstOrNew($query)
 * @method ChatCategoryEntityModel findOrFail($id)
 */
class ChatCategoryRepository extends BaseRepository
{
    /**
     * {@inheritDoc}
     */
    public function modelClass(): string
    {
        return ChatCategoryModel::class;
    }
}
