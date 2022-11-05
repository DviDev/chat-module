<?php

namespace Modules\Chat\Entities\ChatCategoryChannelParticipant;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelParticipantRepository;
use Modules\Chat\Models\ChatCategoryChannelParticipantModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatCategoryChannelParticipantModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryChannelParticipantRepository repository()
 */
class ChatCategoryChannelParticipantEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelParticipantProps;

    protected function repositoryClass(): string
    {
        return ChatCategoryChannelParticipantRepository::class;
    }
}
