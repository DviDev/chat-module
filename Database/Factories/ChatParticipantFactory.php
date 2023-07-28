<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;
use Modules\Chat\Models\ChatParticipantModel;

/**
 * @method ChatParticipantModel create(array $attributes = [])
 * @method ChatParticipantModel make(array $attributes = [])
 */
class ChatParticipantFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatParticipantModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatParticipantEntityModel::props(null, true);
        return [
            $p->chat_id => null,
            $p->user_id => null,
            $p->type => null,
        ];
    }
}
