<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryChannelTopicFileEntityModel;
use Modules\Chat\Models\ChatCategoryChannelTopicFileModel;

 /**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCategoryChannelTopicFileModel model()
 * @method ChatCategoryChannelTopicFileEntityModel find($id)
 * @method ChatCategoryChannelTopicFileModel first()
 * @method ChatCategoryChannelTopicFileModel findOrNew($id)
 * @method ChatCategoryChannelTopicFileModel firstOrNew($query)
 * @method ChatCategoryChannelTopicFileEntityModel findOrFail($id)
 */
class ChatCategoryChannelTopicFileRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatCategoryChannelTopicFileModel::class;
    }
}
