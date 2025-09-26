<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatParticipant;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Chat\Models\ChatParticipantModel;

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
 */
final class ChatParticipantEntityModel extends BaseEntityModel
{
    use ChatParticipantProps;
}
