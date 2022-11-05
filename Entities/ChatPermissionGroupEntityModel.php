<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatPermissionGroupRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $name
 * @property $description
 * @method static self props($alias = null, $force = null)
 * @method ChatPermissionGroupRepository repository()
 */
class ChatPermissionGroupEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatPermissionGroupRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_permission_groups', $alias);
    }
}
