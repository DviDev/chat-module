<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Project\Database\Seeders\ProjectTableSeeder;
use Modules\Project\Models\ProjectModuleModel;

class ChatProjectModuleTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->warn(PHP_EOL . '🤖 🌱 seeding ' . str(__CLASS__)->explode('\\')->last() . ' ...');

        $module = ProjectModuleModel::byName('Chat');
        $project = $module->project;

        $this->call(
            class: PermissionTableSeeder::class,
            parameters: ['module' => $module]
        );

        $this->call(ProjectTableSeeder::class, parameters: ['project' => $project, 'module' => $module]);

        $this->command->warn(PHP_EOL . '🤖 ✔ ' . str(__CLASS__)->explode('\\')->last() . ' ...');
    }
}
