<?php

namespace Modules\Chat\Entities\ChatCategoryChannel;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatCategoryChannelModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatCategoryChannelModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
class ChatCategoryChannelEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelProps;
}
