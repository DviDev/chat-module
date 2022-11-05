<?php

namespace Modules\Chat\Entities\ChatCategoryChannelTopicFile;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelTopicFileRepository;
use Modules\Chat\Models\ChatCategoryChannelTopicFileModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property-read ChatCategoryChannelTopicFileModel $model
 * @method self save()
 * @method static self new()
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryChannelTopicFileRepository repository()
 */
class ChatCategoryChannelTopicFileEntityModel extends BaseEntityModel
{
    use ChatCategoryChannelTopicFileProps;

    protected function repositoryClass(): string
    {
        return ChatCategoryChannelTopicFileRepository::class;
    }
}
