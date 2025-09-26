<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatCategoryChannelTopic;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatCategoryChannelTopicModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class ChatCategoryChannelTopicEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelTopicProps;
}
