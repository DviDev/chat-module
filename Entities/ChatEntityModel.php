<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $user_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method ChatRepository repository()
 */
class ChatEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chats', $alias);
    }
}
