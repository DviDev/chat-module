<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Models\ChatParticipantModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatParticipantModel model()
 * @method ChatParticipantEntityModel find($id)
 * @method ChatParticipantModel first()
 * @method ChatParticipantModel findOrNew($id)
 * @method ChatParticipantModel firstOrNew($query)
 * @method ChatParticipantEntityModel findOrFail($id)
 */
class ChatParticipantRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatParticipantModel::class;
    }
}
