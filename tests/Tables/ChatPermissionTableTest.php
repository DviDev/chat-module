<?php

declare(strict_types=1);

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Contracts\Tests\BaseTest;
use Modules\Chat\Models\ChatPermissionModel;

final class ChatPermissionTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatPermissionModel::class;
    }
}
