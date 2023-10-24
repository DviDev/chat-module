<?php

namespace Modules\Chat\Repositories;

use Modules\Base\Repository\BaseRepository;
use Modules\Chat\Entities\ChannelParticipant\ChannelParticipantEntityModel;
use Modules\Chat\Models\ChannelParticipantModel;

/**
 * @author Davi Menezes(davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method self obj()
 * @method ChannelParticipantModel model()
 * @method ChannelParticipantEntityModel find($id)
 * @method ChannelParticipantModel first()
 * @method ChannelParticipantModel findOrNew($id)
 * @method ChannelParticipantModel firstOrNew($query)
 * @method ChannelParticipantEntityModel findOrFail($id)
 */
class ChatCategoryChannelParticipantRepository extends BaseRepository
{
    /**
     * @inheritDoc
     */
    public function modelClass(): string
    {
        return ChannelParticipantModel::class;
    }
}
