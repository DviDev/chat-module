<?php

namespace Modules\Chat\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;

class ScanTableChatListener implements ShouldQueue
{
    public function handle(ScanTableEvent $event): void
    {
        (new ScanTableDomain)->scan('chat');
    }
}
