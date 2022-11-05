<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEntityModel;
use Modules\Chat\Models\ChatCategoryChannelParticipantModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCategoryChannelParticipantModel model()
 * @method ChatCategoryChannelParticipantEntityModel find($id)
 * @method ChatCategoryChannelParticipantModel first()
 * @method ChatCategoryChannelParticipantModel findOrNew($id)
 * @method ChatCategoryChannelParticipantModel firstOrNew($query)
 * @method ChatCategoryChannelParticipantEntityModel findOrFail($id)
 */
class ChatCategoryChannelParticipantRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatCategoryChannelParticipantModel::class;
    }
}
