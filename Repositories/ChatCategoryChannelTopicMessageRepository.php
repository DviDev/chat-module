<?php
namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageEntityModel;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageModel;

 /**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCategoryChannelTopicMessageModel model()
 * @method ChatCategoryChannelTopicMessageEntityModel find($id)
 * @method ChatCategoryChannelTopicMessageModel first()
 * @method ChatCategoryChannelTopicMessageModel findOrNew($id)
 * @method ChatCategoryChannelTopicMessageModel firstOrNew($query)
 * @method ChatCategoryChannelTopicMessageEntityModel findOrFail($id)
 */
class ChatCategoryChannelTopicMessageRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatCategoryChannelTopicMessageModel::class;
    }
}
