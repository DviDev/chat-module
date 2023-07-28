<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatCategoryChannelUserModel;
use Modules\Chat\Entities\ChatCategoryChannelUser\ChatCategoryChannelUserEntityModel;

/**
 * @method ChatCategoryChannelUserModel create(array $attributes = [])
 * @method ChatCategoryChannelUserModel make(array $attributes = [])
 */
class ChatCategoryChannelUserFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryChannelUserModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryChannelUserEntityModel::props(null, true);
        return [

        ];
    }
}
