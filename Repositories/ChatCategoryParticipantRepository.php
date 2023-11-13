<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;
use Modules\Chat\Models\ChatCategoryParticipantModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChatCategoryParticipantModel model()
 * @method ChatCategoryParticipantEntityModel find($id)
 * @method ChatCategoryParticipantModel first()
 * @method ChatCategoryParticipantModel findOrNew($id)
 * @method ChatCategoryParticipantModel firstOrNew($query)
 * @method ChatCategoryParticipantEntityModel findOrFail($id)
 */
class ChatCategoryParticipantRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChatCategoryParticipantModel::class;
    }
}
