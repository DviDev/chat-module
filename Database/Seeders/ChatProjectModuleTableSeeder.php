<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Project\Database\Seeders\ProjectTableSeeder;
use Modules\Project\Models\ProjectModuleModel;

class ChatProjectModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $module = ProjectModuleModel::byName('Chat');
        $project = $module->project;

        $this->call(
            class: PermissionTableSeeder::class,
            parameters: ['module' => $module]
        );

        $this->call(ProjectTableSeeder::class, parameters: ['project' => $project, 'module' => $module]);
    }
}
