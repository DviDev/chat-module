<?php

namespace Modules\Chat\Entities\ChatUser;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatUserRepository;
use Modules\Chat\Models\ChatUserModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatUserModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatUserRepository repository()
 */
class ChatUserEntityModel extends BaseEntityModel
{
    use ChatUserProps;

    protected function repositoryClass(): string
    {
        return ChatUserRepository::class;
    }
}
