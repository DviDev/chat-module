<?php

namespace Modules\Chat\Entities\ChatCategoryChannelTopicMessage;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelTopicMessageRepository;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatCategoryChannelTopicMessageModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryChannelTopicMessageRepository repository()
 */
class ChatCategoryChannelTopicMessageEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelTopicMessageProps;

    protected function repositoryClass(): string
    {
        return ChatCategoryChannelTopicMessageRepository::class;
    }
}
