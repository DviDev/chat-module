<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatCategoryChannelParticipantModel;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEntityModel;

/**
 * @method ChatCategoryChannelParticipantModel create(array $attributes = [])
 * @method ChatCategoryChannelParticipantModel make(array $attributes = [])
 */
class ChatCategoryChannelParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryChannelParticipantModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryChannelParticipantEntityModel::props(null, true);
        return [
        ];
    }
}
