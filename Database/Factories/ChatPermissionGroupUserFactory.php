<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatPermissionGroupUserModel;
use Modules\Chat\Entities\ChatPermissionGroupUser\ChatPermissionGroupUserEntityModel;

/**
 * @method ChatPermissionGroupUserModel create(array $attributes = [])
 * @method ChatPermissionGroupUserModel make(array $attributes = [])
 */
class ChatPermissionGroupUserFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatPermissionGroupUserModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatPermissionGroupUserEntityModel::props(null, true);
        return [

        ];
    }
}
