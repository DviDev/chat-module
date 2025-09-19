<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChatParticipant;

enum ChatParticipantEnum
{
    case owner;
    case admin;
    case default;

    public static function toArray()
    {
        return collect(self::cases())->pluck('name')->toArray();
    }
}
