<?php

namespace Modules\Chat\Listeners;

use Modules\DBMap\Models\ModuleTableModel;
use Modules\Project\Listeners\CreateMenuItemsListenerContract;
use Modules\Project\Models\MenuModel;

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

    protected function createMenuItem($module, MenuModel $menuModel, ModuleTableModel $table, $key = null): void
    {
        parent::createMenuItem($module, $menuModel, $table, $key);

        $menuModel->active = null;
        $menuModel->save();
    }
}
