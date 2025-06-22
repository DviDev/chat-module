<?php

namespace Modules\Chat\Entities\ChannelParticipant;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChannelParticipantModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChannelParticipantModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ChannelParticipantEntityModel extends BaseEntityModel
{
    use ChannelParticipantProps;
}
