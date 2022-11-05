<?php

  namespace Modules\Chat\Entities;

  use Modules\Base\Entities\BaseEntityModel;
  use Modules\Chat\Repositories\ChatCategoryChannelTopicRepository;

  /**
  * @author Davi Menezes (davimenezes.dev@gmail.com)
  * @link https://github.com/DaviMenezes
  * @property $id
  * @property $channel_id
  * @property $title
  * @property $message
  * @property $created_at
  * @property $user_id
  * @method static self props($alias = null, $force = null)
  * @method ChatCategoryChannelTopicRepository repository()
  */
  class ChatCategoryChannelTopicEntityModel extends BaseEntityModel
  {
      protected function repositoryClass(): string
      {
          return ChatCategoryChannelTopicRepository::class;
      }

      /**
       * @inheritDoc
       */
      public static function dbTable($alias = null)
      {
          return self::setTable('chat_category_channel_topics', $alias);
      }
  }
