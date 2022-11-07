<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEnum;
use Modules\Chat\Models\ChatParticipantModel;
use Modules\Chat\Entities\ChatParticipant\ChatParticipantEntityModel;

/**
 * @method ChatParticipantModel create(array $attributes = [])
 * @method ChatParticipantModel make(array $attributes = [])
 */
class ChatParticipantFactory extends Factory
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
            $p->type => collect(ChatParticipantEnum::toArray())->random(),
        ];
    }
}
