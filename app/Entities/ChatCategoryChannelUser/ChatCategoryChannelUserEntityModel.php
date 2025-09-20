<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatCategoryChannelUser;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatCategoryChannelUserModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatCategoryChannelUserModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class ChatCategoryChannelUserEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelUserProps;
}
