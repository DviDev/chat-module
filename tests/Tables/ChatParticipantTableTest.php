<?php

declare(strict_types=1);

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\Tests\BaseTest;
use Modules\Chat\Models\ChatParticipantModel;

final class ChatParticipantTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatParticipantModel::class;
    }
}
