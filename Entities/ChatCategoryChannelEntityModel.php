<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelRepository;

/**
* @author Davi Menezes (davimenezes.dev@gmail.com)
* @link https://github.com/DaviMenezes
* @property $id
* @property $category_id
* @property $name
* @method static self props($alias = null, $force = null)
* @method ChatCategoryChannelRepository repository()
*/
class ChatCategoryChannelEntityModel extends BaseEntityModel
{
      protected function repositoryClass(): string
      {
        return ChatCategoryChannelRepository::class;
      }

      /**
       * @inheritDoc
       */
      public static function dbTable($alias = null)
      {
          return self::setTable('chat_category_channels', $alias);
      }
}
