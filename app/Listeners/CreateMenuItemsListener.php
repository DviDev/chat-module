<?php

declare(strict_types=1);

namespace Modules\Chat\Listeners;

use Modules\Project\Contracts\CreateMenuItemsListenerContract;

final class CreateMenuItemsListener extends CreateMenuItemsListenerContract
{
    protected function moduleName(): string
    {
        return config('chat.name');
    }
}
