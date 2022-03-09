<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\chat\Entities\ChatCattegoryChannelParticipantEntityModel;
use Modules\chat\Models\ChatCattegoryChannelParticipantModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCattegoryChannelParticipantModel model()
 * @method ChatCattegoryChannelParticipantEntityModel find($id)
 * @method ChatCattegoryChannelParticipantModel first()
 * @method ChatCattegoryChannelParticipantModel findOrNew($id)
 * @method ChatCattegoryChannelParticipantModel firstOrNew($query)
 * @method ChatCattegoryChannelParticipantEntityModel findOrFail($id)
 */
class ChatCategoryChannelParticipantRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatCattegoryChannelParticipantModel::class;
    }
}
