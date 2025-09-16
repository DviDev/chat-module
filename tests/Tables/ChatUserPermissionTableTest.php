<?php

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Chat\Models\ChatUserPermissionModel;

class ChatUserPermissionTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatUserPermissionModel::class;
    }
}
