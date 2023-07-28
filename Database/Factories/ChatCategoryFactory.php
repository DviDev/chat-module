<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatCategoryModel;
use Modules\Chat\Entities\ChatCategory\ChatCategoryEntityModel;

/**
 * @method ChatCategoryModel create(array $attributes = [])
 * @method ChatCategoryModel make(array $attributes = [])
 */
class ChatCategoryFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryEntityModel::props(null, true);
        return [
            $p->chat_id => null,
            $p->name => $this->faker->words(3, true),
        ];
    }
}
