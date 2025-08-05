<?php

namespace Modules\Chat\Listeners;

use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;

class ScanTableChatListener
{
    public function handle(ScanTableEvent $event): void
    {
        (new ScanTableDomain)->scan('chat');
    }
}
