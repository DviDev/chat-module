<?php

declare(strict_types=1);

namespace Modules\Chat\Models;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 *
 * @link https://github.com/DaviMenezes
 *
 * @method ChatCategoryParticipantEntityModel toEntity()
 */
final class ChatCategoryParticipantModel extends BaseModel
{
    use ChatCategoryParticipantProps;

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_participants', $alias);
    }

    public function modelEntity(): string
    {
        return ChatCategoryParticipantEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory
        {
            protected $model = ChatCategoryParticipantModel::class;
        };
    }
}
