<?php
namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Base\Factories\BaseFactory;
use Modules\Chat\Models\ChatCategoryChannelTopicFileModel;
use Modules\Chat\Entities\ChatCategoryChannelTopicFile\ChatCategoryChannelTopicFileEntityModel;

/**
 * @method ChatCategoryChannelTopicFileModel create(array $attributes = [])
 * @method ChatCategoryChannelTopicFileModel make(array $attributes = [])
 */
class ChatCategoryChannelTopicFileFactory extends BaseFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatCategoryChannelTopicFileModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $p = ChatCategoryChannelTopicFileEntityModel::props(null, true);
        return [

        ];
    }
}
