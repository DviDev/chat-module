<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatConfigRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $chat_id
 * @property $time_between_messages
 * @method static self props($alias = null, $force = null)
 * @method ChatConfigRepository repository()
 */
class ChatConfigEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatConfigRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_configs', $alias);
    }
}
