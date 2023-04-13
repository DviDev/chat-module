<?php
namespace Modules\Chat\Database\Factories;

use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatModel;

/**
 * @method ChatModel create(array $attributes = [])
 * @method ChatModel make(array $attributes = [])
 */
class ChatFactory extends BaseFactory
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
        return $this->getValues();
    }
}
