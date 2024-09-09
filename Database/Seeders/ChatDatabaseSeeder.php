<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Nwidart\Modules\Facades\Module;

class ChatDatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $modules = collect(Module::allEnabled());
        if ($modules->contains('DBMap')) {
            /*$this->command->warn(PHP_EOL . '🤖 🚀 scanning chat module ...');
            (new ScanTableDomain())->scan('chat');*/
        }

        $this->call(ChatSeeder::class);

        $this->command->info(PHP_EOL . '🤖 ✔️ chat module: done');
    }
}
