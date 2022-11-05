<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatUserPermissionRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $user_id
 * @property $permission_id
 * @property $created_at
 * @method static self props($alias = null, $force = null)
 * @method ChatUserPermissionRepository repository()
 */
class ChatUserPermissionEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatUserPermissionRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_user_permissions', $alias);
    }
}
