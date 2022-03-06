<?php

namespace Modules\Chat\Models;

use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatParticipantEntityModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatParticipantEntityModel toEntity()
 */
class ChatParticipantModel extends BaseModel
{
    function modelEntity()
    {
        return ChatParticipantEntityModel::class;
    }
}
