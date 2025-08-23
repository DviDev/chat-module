<?php

namespace Modules\Chat\Listeners;

use Modules\Project\Contracts\CreateMenuItemsListenerContract;
use Modules\Project\Models\ProjectModuleEntityDBModel;
use Modules\Project\Models\ProjectModuleMenuModel;

class CreateMenuItemsListener extends CreateMenuItemsListenerContract
{
    public function moduleName(): string
    {
        return config('chat.name');
    }

    protected function createMenuItem(ProjectModuleMenuModel $menuModel, ?ProjectModuleEntityDBModel $entity = null, $active = null): void
    {
        parent::createMenuItem($menuModel, $entity, $active);
    }
}
