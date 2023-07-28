<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;
use Modules\Chat\Entities\ChatCategoryChannelTopic\ChatCategoryChannelTopicEntityModel;

/**
 * @method ChatCategoryChannelTopicModel create(array $attributes = [])
 * @method ChatCategoryChannelTopicModel make(array $attributes = [])
 */
class ChatCategoryChannelTopicFactory extends BaseFactory
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
            $p->channel_id => null,
            $p->title => $this->faker->words(3, true),
            $p->message => $this->faker->sentence(),
            $p->user_id => null,
        ];
    }
}
