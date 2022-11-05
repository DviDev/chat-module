<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;

/**
 * @method ChatCategoryChannelTopicModel create(array $attributes = [])
 * @method ChatCategoryChannelTopicModel make(array $attributes = [])
 */
class ChatCategoryChannelTopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryChannelTopicModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryChannelTopicEntityModel::props(null, true);
        return [

        ];
    }
}
