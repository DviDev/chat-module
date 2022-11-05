<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatGroupPermissionModel;
use Modules\Chat\Entities\ChatGroupPermission\ChatGroupPermissionEntityModel;

/**
 * @method ChatGroupPermissionModel create(array $attributes = [])
 * @method ChatGroupPermissionModel make(array $attributes = [])
 */
class ChatGroupPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatGroupPermissionModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatGroupPermissionEntityModel::props(null, true);
        return [

        ];
    }
}
