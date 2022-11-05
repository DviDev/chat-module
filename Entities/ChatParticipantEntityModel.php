<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatParticipantRepository;
use Modules\Chat\Models\ChatParticipantModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $chat_id
 * @property $user_id
 * @property $type
 * @property $created_at
 * @property $updated_at
 * @property-read ChatParticipantModel $model
 * @method static self props($alias = null, $force = null)
 * @method ChatParticipantRepository repository()
 */
class ChatParticipantEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatParticipantRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_participants', $alias);
    }
}

