<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\DBMap\Entities\ModuleTable\ModuleTableEntityModel;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Project\Models\ProjectModuleEntityActionModel;
use Modules\Project\Models\ProjectModuleEntityDBModel;
use Modules\Project\Models\ProjectModuleModel;
use Modules\Project\Models\ProjectModuleServiceModel;

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

        $entities = [
            ['name' => 'ChatList'],
            ['name' => 'Categories'],
            ['name' => 'Category Channels'],
            ['name' => 'Category Channel Participants'],
            ['name' => 'Category Channel Participant Topics'],
            ['name' => 'Category Channel Topic Files'],
            ['name' => 'Category Channel Topic Messages'],
            ['name' => 'Category Channel Topic Message Files'],
            ['name' => 'Category Channel Users'],
            ['name' => 'Category Participants'],
            ['name' => 'Category Configs'],
            ['name' => 'Category Group Permissions'],
            ['name' => 'Participants'],
            ['name' => 'Permissions'],
            ['name' => 'Permission Groups'],
            ['name' => 'Permission Group Users'],
            ['name' => 'Users'],
            ['name' => 'User Permissions']
        ];
        $module = ProjectModuleModel::factory()
            ->has(ProjectModuleEntityDBModel::factory(count($entities))
                ->afterCreating(function(ProjectModuleEntityDBModel $entity) {
                    $entity->addObserver();
                })
                ->has(ProjectModuleEntityActionModel::factory()
                    ->afterCreating(function(ProjectModuleEntityActionModel $action) {
                        $action->addListener();
                    })
                    ->sequence(
                        ['name' => 'create'],
                        ['name' => 'view'],
                        ['name' => 'update'],
                        ['name' => 'delete'],
                    ), 'actions'
                )->sequence(...$entities)
            )
            ->has(ProjectModuleServiceModel::factory(3)->sequence(
                ['name' => 'Chat Module Service 1'],
                ['name' => 'Chat Module Service 2'],
                ['name' => 'Chat Module Service 3'],
            ))
            ->create(['name' => 'Chat']);



        $this->call(
            class: PermissionTableSeeder::class,
            parameters: ['module' => $module]
        );

        /**@var ProjectModuleEntityDBModel $entity*/
        foreach ($module->entities()->with('actions.entity.module')->with('listeners')->get()->all() as $entity) {
            foreach ($entity->listeners as $listener) {
                $modelKeys = $module->services()->get()->modelKeys();
                $listener->services()->attach($modelKeys);
            }
            $entity->addPermission();

            /**@var ProjectModuleEntityActionModel $action*/
            foreach ($entity->actions as $action) {
                $action->addPermission();
            }
        }
    }
}
