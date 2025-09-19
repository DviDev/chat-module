<?php

declare(strict_types=1);

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Chat\Models\ChatCategoryParticipantModel;

final class ChatCategoryParticipantTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatCategoryParticipantModel::class;
    }
}
