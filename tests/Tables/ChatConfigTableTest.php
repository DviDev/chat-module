<?php

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Chat\Models\ChatConfigModel;

class ChatConfigTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatConfigModel::class;
    }
}
