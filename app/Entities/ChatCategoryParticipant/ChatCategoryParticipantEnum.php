<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatCategoryParticipant;

enum ChatCategoryParticipantEnum
{
    case owner;
    case admin;
    case default;

    public static function toArray(): array
    {
        return collect(self::cases())->pluck('name')->toArray();
    }
}
