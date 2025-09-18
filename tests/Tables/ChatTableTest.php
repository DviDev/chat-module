<?php

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Chat\Models\ChatModel;

class ChatTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatModel::class;
    }
}
