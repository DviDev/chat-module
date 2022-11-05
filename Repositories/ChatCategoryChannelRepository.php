<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryChannelEntityModel;
use Modules\Chat\Models\ChatCategoryChannelModel;

 /**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCategoryChannelModel model()
 * @method ChatCategoryChannelEntityModel find($id)
 * @method ChatCategoryChannelModel first()
 * @method ChatCategoryChannelModel findOrNew($id)
 * @method ChatCategoryChannelModel firstOrNew($query)
 * @method ChatCategoryChannelEntityModel findOrFail($id)
 */
class ChatCategoryChannelRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass()
    {
        return ChatCategoryChannelModel::class;
    }
}
