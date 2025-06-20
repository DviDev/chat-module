<?php

namespace Modules\Chat\Entities\ChatCategoryChannelUser;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Models\ChatCategoryChannelUserModel;
use Modules\Chat\Repositories\ChatCategoryChannelUserRepository;

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
 * @method ChatCategoryChannelUserRepository repository()
 */
class ChatCategoryChannelUserEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelUserProps;

    protected function repositoryClass(): string
    {
        return ChatCategoryChannelUserRepository::class;
    }
}
