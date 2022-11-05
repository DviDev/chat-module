<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatUserRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $chat_id
 * @property $user_id
 * @property $invite_id
 * @method static self props($alias = null, $force = null)
 * @method ChatUserRepository repository()
 */
class ChatUserEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatUserRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_users', $alias);
    }
}
