<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatUserPermissionModel;
use Modules\Chat\Entities\ChatUserPermission\ChatUserPermissionEntityModel;

/**
 * @method ChatUserPermissionModel create(array $attributes = [])
 * @method ChatUserPermissionModel make(array $attributes = [])
 */
class ChatUserPermissionFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatUserPermissionModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatUserPermissionEntityModel::props(null, true);
        return [

        ];
    }
}
