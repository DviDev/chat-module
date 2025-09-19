<?php

declare(strict_types=1);

namespace Modules\Chat\Listeners;

use Modules\Chat\Entities\Chat\ChatEntityModel;
use Modules\Chat\Models\ChatModel;
use Modules\Project\Contracts\DefineSearchableAttributesContract;

final class DefineSearchableAttributes extends DefineSearchableAttributesContract
{
    protected function moduleName(): string
    {
        return config('chat.name');
    }

    protected function searchableFields(): array
    {
        $p = ChatEntityModel::props();

        return [
            ChatModel::table() => [
                $p->id,
                $p->user_id,
                $p->name,
            ],
        ];
    }
}
