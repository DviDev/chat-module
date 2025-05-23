<?php

namespace Modules\Chat\Entities\ChatCategoryChannelTopic;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelTopicRepository;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatCategoryChannelTopicModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryChannelTopicRepository repository()
 */
class ChatCategoryChannelTopicEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelTopicProps;

    protected function repositoryClass(): string
    {
        return ChatCategoryChannelTopicRepository::class;
    }
}
