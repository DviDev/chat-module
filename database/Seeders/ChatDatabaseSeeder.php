<?php

declare(strict_types=1);

namespace Modules\Chat\Database\Seeders;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Contracts\BaseSeeder;

final class ChatDatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(?Command $command = null)
    {
        Model::unguard();

        $this->call(ChatSeeder::class);

        $this->command->info(PHP_EOL.'🤖 ✔️ chat module: done');
    }
}
