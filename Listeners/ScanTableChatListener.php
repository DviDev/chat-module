<?php

namespace Modules\Chat\Listeners;

use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;

class ScanTableChatListener
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
    public function handle(ScanTableEvent $event): void
    {
        $event->command->warn(PHP_EOL . '🤖 🚀 scanning chat module ...');
        (new ScanTableDomain())->scan('chat');
    }
}
