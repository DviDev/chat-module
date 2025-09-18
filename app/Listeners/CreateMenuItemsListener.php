<?php

namespace Modules\Chat\Listeners;

use Modules\Project\Contracts\CreateMenuItemsListenerContract;

class CreateMenuItemsListener extends CreateMenuItemsListenerContract
{
    protected function moduleName(): string
    {
        return config('chat.name');
    }
}
