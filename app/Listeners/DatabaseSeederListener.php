<?php

namespace Modules\Chat\Listeners;

use Modules\Base\Events\DatabaseSeederEvent;
use Modules\Chat\Database\Seeders\ChatDatabaseSeeder;

class DatabaseSeederListener
{
    public function handle(DatabaseSeederEvent $event): void
    {
        \Artisan::call('db:seed', ['--class' => ChatDatabaseSeeder::class]);
    }
}
