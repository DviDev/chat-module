<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\ChatUserModel;
use Modules\Chat\Entities\ChatUser\ChatUserEntityModel;

/**
 * @method ChatUserModel create(array $attributes = [])
 * @method ChatUserModel make(array $attributes = [])
 */
class ChatUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatUserModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatUserEntityModel::props(null, true);
        return [

        ];
    }
}
