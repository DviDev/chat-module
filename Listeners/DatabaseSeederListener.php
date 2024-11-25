<?php

namespace Modules\Chat\Listeners;

use Modules\Base\Events\DatabaseSeederEvent;
use Modules\Chat\Database\Seeders\ChatDatabaseSeeder;

class DatabaseSeederListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DatabaseSeederEvent $event): void
    {
        \Artisan::call('db:seed', ['--class' => ChatDatabaseSeeder::class]);
    }
}
