<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatMessageUserRead;

use Modules\Base\Contracts\BaseEntityModel;
use Modules\Seguro\Models\ChatMessageUserReadModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatMessageUserReadModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 */
final class ChatMessageUserReadEntityModel extends BaseEntityModel
{
    use ChatMessageUserReadProps;
}
