<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Models\BaseModel;
use Modules\Chat\Database\Factories\ChatCategoryParticipantFactory;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantProps;

/**
 * @author Davi Menezes (davimenezes.dev@gmail.com)
 * @link https://github.com/DaviMenezes
 * @method ChatCategoryParticipantEntityModel toEntity()
 * @method static ChatCategoryParticipantFactory factory()
 */
class ChatCategoryParticipantModel extends BaseModel
{
    use HasFactory;
    use ChatCategoryParticipantProps;

    public function modelEntity(): string
    {
        return ChatCategoryParticipantEntityModel::class;
    }

    protected static function newFactory(): ChatCategoryParticipantFactory
    {
        return new ChatCategoryParticipantFactory();
    }

    public static function table($alias = null): string
    {
        return self::dbTable('chat_category_participants', $alias);
    }
}
