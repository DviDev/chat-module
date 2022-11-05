<?php

namespace Modules\Chat\Entities;

use Modules\Base\Entities\BaseEntityModel;
use Modules\Chat\Repositories\ChatCategoryChannelTopicFileRepository;

/**
  * @author Davi Menezes (davimenezes.dev@gmail.com)
  * @link https://github.com/DaviMenezes
  * @property $id
  * @property $topic_id
  * @property $path
  * @method static self props($alias = null, $force = null)
  * @method ChatCategoryChannelTopicFileRepository repository()
*/
class ChatCategoryChannelTopicFileEntityModel extends BaseEntityModel
{
      protected function repositoryClass(): string
      {
          return ChatCategoryChannelTopicFileRepository::class;
      }

      /**
       * @inheritDoc
       */
      public static function dbTable($alias = null)
      {
          return self::setTable('chat_category_channel_topic_files', $alias);
      }
  }

