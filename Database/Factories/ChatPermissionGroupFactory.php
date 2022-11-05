<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatPermissionGroupModel;
use Modules\Chat\Entities\ChatPermissionGroup\ChatPermissionGroupEntityModel;

/**
 * @method ChatPermissionGroupModel create(array $attributes = [])
 * @method ChatPermissionGroupModel make(array $attributes = [])
 */
class ChatPermissionGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatPermissionGroupModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatPermissionGroupEntityModel::props(null, true);
        return [

        ];
    }
}
