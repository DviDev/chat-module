<?php

declare(strict_types=1);

namespace Modules\Chat\Entities\ChannelParticipant;

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
