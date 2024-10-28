<?php

namespace Modules\Chat\Listeners;

use Modules\DBMap\Models\ModuleTableModel;
use Modules\Project\Listeners\CreateMenuItemsListenerContract;
use Modules\Project\Models\MenuModel;
use Modules\Project\Models\ProjectModuleEntityDBModel;

class CreateMenuItemsListener extends CreateMenuItemsListenerContract
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    function moduleName(): string
    {
        return config('chat.name');
    }

    protected function createMenuItem(MenuModel $menuModel, ProjectModuleEntityDBModel $entity, $key = null): void
    {
        parent::createMenuItem($menuModel, $entity, $key);

        $menuModel->active = null;
        $menuModel->save();
    }
}
