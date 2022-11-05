<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatModel;
use Modules\Chat\Entities\Chat\ChatEntityModel;

/**
 * @method ChatModel create(array $attributes = [])
 * @method ChatModel make(array $attributes = [])
 */
class ChatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatEntityModel::props(null, true);
        return [

        ];
    }
}
