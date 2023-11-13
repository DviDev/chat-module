<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Factories\BaseFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryParticipantEntityModel toEntity()
 */
class ChatCategoryParticipantModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryParticipantProps;

    public function modelEntity(): string
    {
        return ChatCategoryParticipantEntityModel::class;
    }

    protected static function newFactory(): BaseFactory
    {
        return new class extends BaseFactory {
            protected $model = ChatCategoryParticipantModel::class;
        };
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_participants', $alias);
    }
}
