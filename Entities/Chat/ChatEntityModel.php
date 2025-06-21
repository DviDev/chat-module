<?php

namespace Modules\Chat\Entities\Chat;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatModel;
use Modules\Chat\Repositories\ChatRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @property-read ChatModel $model
 *
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatRepository repository()
 */
class ChatEntityModel extends BaseEntityModel
{
    use ChatProps;

    protected function repositoryClass(): string
    {
        return ChatRepository::class;
    }
}
