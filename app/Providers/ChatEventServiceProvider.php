<?php

namespace Modules\Chat\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Base\Events\DatabaseSeederEvent;
use Modules\Chat\Listeners\CreateMenuItemsListener;
use Modules\Chat\Listeners\DatabaseSeederListener;
use Modules\Chat\Listeners\DefineSearchableAttributes;
use Modules\Chat\Listeners\ScanTableChatListener;
use Modules\DBMap\Events\ScanTableEvent;
use Modules\Project\Events\CreateMenuItemsEvent;
use Modules\View\Events\DefineSearchableAttributesEvent;

class ChatEventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        \Event::listen(CreateMenuItemsEvent::class, CreateMenuItemsListener::class);
        \Event::listen(ScanTableEvent::class, ScanTableChatListener::class);
        \Event::listen(DatabaseSeederEvent::class, DatabaseSeederListener::class);
        \Event::listen(DefineSearchableAttributesEvent::class, DefineSearchableAttributes::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
