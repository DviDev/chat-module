<?php

declare(strict_types=1);

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Project\Database\Seeders\ProjectTableSeeder;

final class ChatProjectModuleTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->warn(PHP_EOL.'🤖 🌱 seeding '.str(__CLASS__)->explode('\\')->last().' ...');

        $this->call(
            class: PermissionTableSeeder::class,
            parameters: ['module_name' => 'Chat']
        );

        $this->call(ProjectTableSeeder::class, parameters: [
            'module_name' => 'Chat',
        ]);

        $this->command->warn(PHP_EOL.'🤖 ✔ '.str(__CLASS__)->explode('\\')->last().' ...');
    }
}
