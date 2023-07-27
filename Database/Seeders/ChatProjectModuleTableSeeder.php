<?php

namespace Modules\Chat\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\DBMap\Entities\ModuleTable\ModuleTableEntityModel;
use Modules\DBMap\Models\ModuleTableAttributeModel;
use Modules\DBMap\Models\ModuleTableModel;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Project\Entities\Project\ProjectStatusTypeEnum;
use Modules\Project\Entities\ProjectStatus\ProjectStatusEntityModel;
use Modules\Project\Models\ProjectCommentModel;
use Modules\Project\Models\ProjectEntityAttributeModel;
use Modules\Project\Models\ProjectModuleEntityActionModel;
use Modules\Project\Models\ProjectModuleEntityDBModel;
use Modules\Project\Models\ProjectModuleModel;
use Modules\Project\Models\ProjectModuleServiceModel;
use Modules\Project\Models\ProjectParticipantModel;
use Modules\Project\Models\ProjectRequirementModel;
use Modules\Project\Models\ProjectRequirementRestrictionModel;
use Modules\Project\Models\ProjectStatusModel;
use Modules\Project\Models\ProjectStatusTypeModel;
use Modules\Project\Models\ProjectTagModel;
use Modules\Task\Database\Seeders\TaskTableSeeder;
use Nwidart\Modules\Facades\Module;
use Modules\Project\Database\Seeders\ProjectTableSeeder;

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

        $module = ProjectModuleModel::query()->where('name', 'Chat')->first();
        $project = $module->project;

        $this->call(ProjectTableSeeder::class, parameters: ['project' => $project]);


//        $participants = ProjectParticipantModel::factory(3)
//            ->for($project)
//            ->sequence(['participant_id' => User::factory()->create()->id])
//            ->create();

        $this->call(
            class: PermissionTableSeeder::class,
            parameters: ['module' => $module]
        );

        /**@var ProjectModuleEntityDBModel $entity */
        $entities = $module->entities()
            ->with('actions.entity.module')
            ->with('listeners')
            ->with('moduleTable.tableAttributes')
            ->get()->all();
        foreach ($entities as $entity) {
            foreach ($entity->moduleTable->tableAttributes as $tableAttribute) {
                ProjectEntityAttributeModel::create([
                    'name' => $tableAttribute->name,
                    'entity_id' => $entity->id,
                    'required' => $tableAttribute->requirement,
                    'type_id' => $tableAttribute->type,
                    'user_id' => $project->owner_id,
                    'size' => $tableAttribute->size
                ]);
            }
            foreach ($entity->listeners as $listener) {
                $modelKeys = $module->services()->get()->modelKeys();
                $listener->services()->attach($modelKeys);
            }
            $entity->addPermission();

            /**@var ProjectModuleEntityActionModel $action */
            foreach ($entity->actions as $action) {
                $action->addPermission();
            }
        }


        ProjectRequirementModel::factory(3)->for($project)
            ->sequence(
                ['description' => 'must be of legal age'],
                ['description' => 'can be schedule'],
                ['description' => "can't have accents"],
                ['description' => "can be made up of more than one word"],
                ['description' => "can't spam"],
                ['description' => "can't do anything before validating the email"],
            )
            ->has(ProjectRequirementRestrictionModel::factory(3));

        $seed_total = config('app.SEED_MODULE_CATEGORY_COUNT');
        ProjectTagModel::factory($seed_total)->for($project)->create();

        ProjectCommentModel::factory(config('app.SEED_COMMENTS_COUNT', 3))->for($project)
            ->sequence(
                ['parent_id' => null],
                ['parent_id' => $project->comments()->inRandomOrder()->first('id')->id ?? null],
            )
            ->create();

        ProjectStatusModel::factory()->create(['status_type_id' => ProjectStatusTypeEnum::open]);



    }
}
