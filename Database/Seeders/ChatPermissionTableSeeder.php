<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\BaseSeeder;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;
use Modules\Chat\Models\ChatPermissionModel;
use Modules\Chat\Services\Enums\PermissionEnum;

class ChatPermissionTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->warn(PHP_EOL . '🤖 🌱 seeding CHAT PERMISSIONS ...');

        $items = [
            PermissionEnum::READ,
            PermissionEnum::WRITE,
            PermissionEnum::UPDATE,
            PermissionEnum::DELETE
        ];
        $permissions = collect($items);

        $permissions->each(function (PermissionEnum $permission) {
            $entity = ChatPermissionEntityModel::props();
            ChatPermissionModel::query()->updateOrCreate(
                [$entity->name => $permission->name],
                [$entity->description => "bla bla bla"]
            );
        });

        $this->command->warn(PHP_EOL . '🤖 ✔ ️ CHAT PERMISSIONS done');
    }
}
