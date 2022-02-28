<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelTopicMessageFileRepository;

/**
* @author Davi Menezes (davimenezes.dev@gmail.com)
* @link https://github.com/DaviMenezes
* @property $id
* @property $message_id
* @property $path
* @method static self props($alias = null, $force = null)
* @method ChatCategoryChannelTopicMessageFileRepository repository()
*/
class ChatCategoryChannelTopicMessageFileEntityModel extends BaseEntityModel
{
      protected function repositoryClass(): string
      {
          return ChatCategoryChannelTopicMessageFileRepository::class;
      }

      /**
       * @inheritDoc
       */
      public static function dbTable($alias = null)
      {
          return self::setTable('chat_category_channel_topic_message_files', $alias);
      }
  }

