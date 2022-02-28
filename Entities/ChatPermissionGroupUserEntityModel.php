<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatPermissionGroupUserRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $group_id
 * @property $user_id
 * @method static self props($alias = null, $force = null)
 * @method ChatPermissionGroupUserRepository repository()
 */
class ChatPermissionGroupUserEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatPermissionGroupUserRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_permission_group_users', $alias);
    }
}
