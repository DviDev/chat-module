<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatPermissionRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $name
 * @property $description
 * @method static self props($alias = null, $force = null)
 * @method ChatPermissionRepository repository()
 */
class ChatPermissionEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatPermissionRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_permissions', $alias);
    }
}
