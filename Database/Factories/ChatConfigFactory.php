<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatConfigModel;
use Modules\Chat\Entities\ChatConfig\ChatConfigEntityModel;

/**
 * @method ChatConfigModel create(array $attributes = [])
 * @method ChatConfigModel make(array $attributes = [])
 */
class ChatConfigFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatConfigModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatConfigEntityModel::props(null, true);
        return [
            $p->chat_id => null,
            $p->time_between_messages => 3,
        ];
    }
}
