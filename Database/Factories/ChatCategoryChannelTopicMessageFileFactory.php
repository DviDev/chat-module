<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatCategoryChannelTopicMessageFileModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicMessageFile\ChatCategoryChannelTopicMessageFileEntityModel;

/**
 * @method ChatCategoryChannelTopicMessageFileModel create(array $attributes = [])
 * @method ChatCategoryChannelTopicMessageFileModel make(array $attributes = [])
 */
class ChatCategoryChannelTopicMessageFileFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryChannelTopicMessageFileModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryChannelTopicMessageFileEntityModel::props(null, true);
        return [

        ];
    }
}
