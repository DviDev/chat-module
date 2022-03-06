<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCattegoryChannelParticipantEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCattegoryChannelParticipantEntityModel toEntity()
 */
class ChatCattegoryChannelParticipantModel extends BaseModel
{
    function modelEntity()
    {
        return ChatCattegoryChannelParticipantEntityModel::class;
    }
}
