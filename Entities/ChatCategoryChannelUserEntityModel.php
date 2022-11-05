<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelUserRepository;

/**
* @author Davi Menezes (davimenezes.dev@gmail.com)
* @link https://github.com/DaviMenezes
* @property $id
* @property $channel_id
* @property $user_id
* @property $created_at
* @method static self props($alias = null, $force = null)
* @method ChatCategoryChannelUserRepository repository()
*/
class ChatCategoryChannelUserEntityModel extends BaseEntityModel
{
    protected function repositoryClass(): string
    {
        return ChatCategoryChannelUserRepository::class;
    }

      /**
       * @inheritDoc
       */
    public static function dbTable($alias = null)
    {
        return self::setTable('chat_category_channel_users', $alias);
    }
}

