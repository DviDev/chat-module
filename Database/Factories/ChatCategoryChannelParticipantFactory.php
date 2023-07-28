<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatCategoryChannelParticipant\ChatCategoryChannelParticipantEntityModel;
use Modules\Chat\Models\ChatCategoryChannelParticipantModel;

/**
 * @method ChatCategoryChannelParticipantModel create(array $attributes = [])
 * @method ChatCategoryChannelParticipantModel make(array $attributes = [])
 */
class ChatCategoryChannelParticipantFactory extends BaseFactory
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
            $p->channel_id => null,
            $p->user_id => null,
            $p->type => null,
        ];
    }
}
