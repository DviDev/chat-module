<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatConfigEntityModel;
use Modules\Chat\Models\ChatConfigModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatConfigModel model()
 * @method ChatConfigEntityModel find($id)
 * @method ChatConfigModel first()
 * @method ChatConfigModel findOrNew($id)
 * @method ChatConfigModel firstOrNew($query)
 * @method ChatConfigEntityModel findOrFail($id)
 */
class ChatConfigRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatConfigModel::class;
    }
}
