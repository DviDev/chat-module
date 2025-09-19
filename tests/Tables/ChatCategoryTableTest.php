<?php

declare(strict_types=1);

namespace Modules\Chat\Tests\Tables;

use Modules\Base\Contracts\BaseModel;
use Modules\Base\Services\Tests\BaseTest;
use Modules\Chat\Models\ChatCategoryModel;

final class ChatCategoryTableTest extends BaseTest
{
    public function getModelClass(): string|BaseModel
    {
        return ChatCategoryModel::class;
    }
}
