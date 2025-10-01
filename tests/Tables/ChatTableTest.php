<?php

declare(strict_types=1);

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\BaseTest;
use Modules\Chat\Models\ChatModel;

final class ChatTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatModel::class;
    }
}
