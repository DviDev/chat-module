<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryParticipantRepository;
use Modules\Chat\Models\ChatCategoryParticipantModel;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $category_id
 * @property $user_id
 * @property $type
 * @property $created_at
 * @property $updated_at
 * @property-read ChatCategoryParticipantModel $model
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryParticipantRepository repository()
 */
class ChatCategoryParticipantEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatCategoryParticipantRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_category_participants', $alias);
    }
}

