<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatCategoryChannelModel;
use Modules\Chat\Entities\ChatCategoryChannel\ChatCategoryChannelEntityModel;

/**
 * @method ChatCategoryChannelModel create(array $attributes = [])
 * @method ChatCategoryChannelModel make(array $attributes = [])
 */
class ChatCategoryChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryChannelModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryChannelEntityModel::props(null, true);
        return [

        ];
    }
}
