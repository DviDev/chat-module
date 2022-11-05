<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatGroupPermissionRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $group_id
 * @property $permission_id
 * @method static self props($alias = null, $force = null)
 * @method ChatGroupPermissionRepository repository()
 */
class ChatGroupPermissionEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatGroupPermissionRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_group_permissions', $alias);
    }
}
