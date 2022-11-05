<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryChannelTopicMessageFileFactory;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageFile\ChatCategoryChannelTopicMessageFileEntityModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageFile\ChatCategoryChannelTopicMessageFileProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryChannelTopicMessageFileEntityModel toEntity()
 * @method ChatCategoryChannelTopicMessageFileFactory factory()
 */
class ChatCategoryChannelTopicMessageFileModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryChannelTopicMessageFileProps;

    public function modelEntity(): string
    {
        return ChatCategoryChannelTopicMessageFileEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryChannelTopicMessageFileFactory
    {
        return new ChatCategoryChannelTopicMessageFileFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_channel_topic_message_files', $alias);
    }
}
