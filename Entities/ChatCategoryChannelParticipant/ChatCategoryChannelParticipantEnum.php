<?php

namespace Modules\Chat\Entities\ChatCategoryChannelParticipant;

enum ChatCategoryChannelParticipantEnum
{
    case owner;
    case admin;
    case default;

    public static function toArray(): array
    {
        return collect(self::cases())->pluck('name')->toArray();
    }
}
