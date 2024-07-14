<?php

namespace Modules\Chat\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Chat\Listeners\CreateMenuItemsListener;
use Modules\Project\Events\CreateMenuItemsEvent;

class ChatEventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        \Event::listen(CreateMenuItemsEvent::class, CreateMenuItemsListener::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
