<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelTopicFileFactory;
use Modules\Chat\Entities\ChatCategoryChannelTopicFile\ChatCategoryChannelTopicFileEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicFile\ChatCategoryChannelTopicFileProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicFileEntityModel toEntity()
 * @method static ChatCategoryChannelTopicFileFactory factory()
 */
class ChatCategoryChannelTopicFileModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelTopicFileProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelTopicFileEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatCategoryChannelTopicFileModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_topic_files', $alias);
    }
}
