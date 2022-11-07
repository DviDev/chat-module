<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEnum;
use Modules\Chat\Models\ChatCategoryParticipantModel;
use Modules\Chat\Entities\ChatCategoryParticipant\ChatCategoryParticipantEntityModel;

/**
 * @method ChatCategoryParticipantModel create(array $attributes = [])
 * @method ChatCategoryParticipantModel make(array $attributes = [])
 */
class ChatCategoryParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryParticipantModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryParticipantEntityModel::props(null, true);
        return [
            $p->category_id => null,
            $p->user_id => null,
            $p->type => collect(ChatCategoryParticipantEnum::toArray())->random(),
        ];
    }
}
