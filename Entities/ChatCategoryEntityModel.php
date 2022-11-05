<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryRepository;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @property $id
 * @property $chat_id
 * @property $name
 * @property $created_at
 * @property $created_by_user_id
 * @method static self props($alias = null, $force = null)
 * @method ChatCategoryRepository repository()
 */
class ChatCategoryEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatCategoryRepository::class;
    }

    /**
     * @inheritDoc
     */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_categories', $alias);
    }
}
