<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelParticipantRepository;
use Modules\Chat\Models\ChatCategoryChannelParticipantModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $channel_id
 * @property $user_id
 * @property $type
 * @property $created_at
 * @property $updated_at
 * @property-read ChatCategoryChannelParticipantModel $model
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryChannelParticipantRepository repository()
 */
class ChatCategoryChannelParticipantEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatCategoryChannelParticipantRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_category_channel_participants', $alias);
    }
}

