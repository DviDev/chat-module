<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryChannelTopicEntityModel;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;

 /**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCategoryChannelTopicModel model()
 * @method ChatCategoryChannelTopicEntityModel find($id)
 * @method ChatCategoryChannelTopicModel first()
 * @method ChatCategoryChannelTopicModel findOrNew($id)
 * @method ChatCategoryChannelTopicModel firstOrNew($query)
 * @method ChatCategoryChannelTopicEntityModel findOrFail($id)
 */
class ChatCategoryChannelTopicRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass()
    {
        return ChatCategoryChannelTopicModel::class;
    }
}
