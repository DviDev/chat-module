<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Chat\Entities\ChatPermissionEntityModel;
use Modules\Chat\Models\ChatPermissionModel;
use Modules\Chat\Services\Enums\PermissionEnum;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $items = [
            PermissionEnum::READ,
            PermissionEnum::WRITE,
            PermissionEnum::UPDATE,
            PermissionEnum::DELETE
        ];
        $permissions = collect($items);

        $permissions->each(function ($permission) {
            $entity = ChatPermissionEntityModel::props();
            if (ChatPermissionModel::query()->where($entity->name, $permission)->exists()) {
                return;
            }
            $entity->name = $permission;
            $entity->save();
        });

    }
}
