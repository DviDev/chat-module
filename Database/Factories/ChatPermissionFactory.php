<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatPermissionModel;
use Modules\Chat\Entities\ChatPermission\ChatPermissionEntityModel;

/**
 * @method ChatPermissionModel create(array $attributes = [])
 * @method ChatPermissionModel make(array $attributes = [])
 */
class ChatPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatPermissionModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatPermissionEntityModel::props(null, true);
        return [

        ];
    }
}
