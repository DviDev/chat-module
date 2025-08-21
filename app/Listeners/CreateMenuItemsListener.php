<?php

namespace Modules\Chat\Listeners;

use Modules\Project\Contracts\CreateMenuItemsListenerContract;
use Modules\Project\Models\MenuModel;
use Modules\Project\Models\ProjectModuleEntityDBModel;

class CreateMenuItemsListener extends CreateMenuItemsListenerContract
{
    public function moduleName(): string
    {
        return config('chat.name');
    }

    protected function createMenuItem(MenuModel $menuModel, ?ProjectModuleEntityDBModel $entity = null, $active = null): void
    {
        parent::createMenuItem($menuModel, $entity, $active);

        $menuModel->active = null;
        $menuModel->save();
    }
}
