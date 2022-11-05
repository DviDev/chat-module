<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessage\ChatCategoryChannelTopicMessageEntityModel;

/**
 * @method ChatCategoryChannelTopicMessageModel create(array $attributes = [])
 * @method ChatCategoryChannelTopicMessageModel make(array $attributes = [])
 */
class ChatCategoryChannelTopicMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryChannelTopicMessageModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryChannelTopicMessageEntityModel::props(null, true);
        return [

        ];
    }
}
