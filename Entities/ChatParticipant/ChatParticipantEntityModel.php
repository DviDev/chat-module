<?php

namespace Modules\Chat\Entities\ChatParticipant;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatParticipantModel;
use Modules\Chat\Repositories\ChatParticipantRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatParticipantModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatParticipantRepository repository()
 */
class ChatParticipantEntityModel extends BaseEntityModel
{
    use ChatParticipantProps;

    protected function repositoryClass(): string
    {
        return ChatParticipantRepository::class;
    }
}
