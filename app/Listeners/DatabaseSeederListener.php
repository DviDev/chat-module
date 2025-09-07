<?php

namespace Modules\Chat\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Artisan;
use Modules\Base\Events\DatabaseSeederEvent;
use Modules\Chat\Database\Seeders\ChatSeeder;

class DatabaseSeederListener implements ShouldQueue
{
    public function handle(DatabaseSeederEvent $event): void
    {
        Artisan::call('db:seed', ['--class' => ChatSeeder::class]);
    }
}
