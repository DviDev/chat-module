<?php

namespace Modules\Chat\Entities\ChatCategoryChannelTopicMessageFile;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelTopicMessageFileRepository;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageFileModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatCategoryChannelTopicMessageFileModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryChannelTopicMessageFileRepository repository()
 */
class ChatCategoryChannelTopicMessageFileEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelTopicMessageFileProps;

    protected function repositoryClass(): string
    {
        return ChatCategoryChannelTopicMessageFileRepository::class;
    }
}
