<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatCategoryParticipant;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatCategoryParticipantModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatCategoryParticipantModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class ChatCategoryParticipantEntityModel extends BaseEntityModel
{
    use ChatCategoryParticipantProps;
}
