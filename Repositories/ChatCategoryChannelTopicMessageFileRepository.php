<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageFileEntityModel;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageFileModel;

 /**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCategoryChannelTopicMessageFileModel model()
 * @method ChatCategoryChannelTopicMessageFileEntityModel find($id)
 * @method ChatCategoryChannelTopicMessageFileModel first()
 * @method ChatCategoryChannelTopicMessageFileModel findOrNew($id)
 * @method ChatCategoryChannelTopicMessageFileModel firstOrNew($query)
 * @method ChatCategoryChannelTopicMessageFileEntityModel findOrFail($id)
 */
class ChatCategoryChannelTopicMessageFileRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatCategoryChannelTopicMessageFileModel::class;
    }
}
