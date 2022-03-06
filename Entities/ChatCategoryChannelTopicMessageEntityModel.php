<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelTopicMessageRepository;

/**
* @author Davi Menezes (davimenezes.dev@gmail.com)
* @link https://github.com/DaviMenezes
* @property $id
* @property $topic_id
* @property $parent_id
* @property $user_id
* @property $message
* @property $created_at
* @method static self props($alias = null, $force = null)
* @method ChatCategoryChannelTopicMessageRepository repository()
*/
class ChatCategoryChannelTopicMessageEntityModel extends BaseEntityModel
  {
      protected function repositoryClass(): string
      {
          return ChatCategoryChannelTopicMessageRepository::class;
      }

      /**
       * @inheritDoc
       */
      public static function dbTable($alias = null)
      {
          return self::setTable('chat_category_channel_topic_messages', $alias);
      }
  }

