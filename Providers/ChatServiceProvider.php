<?php

namespace Modules\Chat\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Chat\Http\Livewire\ChatCategoryChannelParticipantTable;
use Modules\Chat\Http\Livewire\ChatCategoryChannelTable;
use Modules\Chat\Http\Livewire\ChatCategoryChannelTopicFileTable;
use Modules\Chat\Http\Livewire\ChatCategoryChannelTopicMessageFileTable;
use Modules\Chat\Http\Livewire\ChatCategoryChannelTopicMessageTable;
use Modules\Chat\Http\Livewire\ChatCategoryChannelTopicTable;
use Modules\Chat\Http\Livewire\ChatCategoryChannelUserTable;
use Modules\Chat\Http\Livewire\ChatCategoryParticipantTable;
use Modules\Chat\Http\Livewire\ChatCategoryTable;
use Modules\Chat\Http\Livewire\ChatConfigTable;
use Modules\Chat\Http\Livewire\ChatGroupPermissionTable;
use Modules\Chat\Http\Livewire\ChatParticipantTable;
use Modules\Chat\Http\Livewire\ChatPermissionGroupTable;
use Modules\Chat\Http\Livewire\ChatPermissionGroupUserTable;
use Modules\Chat\Http\Livewire\ChatPermissionTable;
use Modules\Chat\Http\Livewire\ChatTable;
use Modules\Chat\Http\Livewire\ChatUserPermissionTable;
use Modules\Chat\Http\Livewire\ChatUserTable;
use Modules\Chat\Livewire\Channel\Topic\MessagesChatPage;
use Modules\Chat\Livewire\Chat\TopicItem;

class ChatServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Chat';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'chat';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \Livewire::component('chat::category-channel-participant-table', ChatCategoryChannelParticipantTable::class);
        \Livewire::component('chat::category-channel-table', ChatCategoryChannelTable::class);
        \Livewire::component('chat::category-channel-topic-file-table', ChatCategoryChannelTopicFileTable::class);
        \Livewire::component('chat::category-channel-topic-message-file-table', ChatCategoryChannelTopicMessageFileTable::class);
        \Livewire::component('chat::category-channel-topic-message-table', ChatCategoryChannelTopicMessageTable::class);
        \Livewire::component('chat::category-channel-topic-table', ChatCategoryChannelTopicTable::class);
        \Livewire::component('chat::category-channel-user-table', ChatCategoryChannelUserTable::class);
        \Livewire::component('chat::category-participant-table', ChatCategoryParticipantTable::class);
        \Livewire::component('chat::category-table', ChatCategoryTable::class);
        \Livewire::component('chat::config-table', ChatConfigTable::class);
        \Livewire::component('chat::group-permission-table', ChatGroupPermissionTable::class);
        \Livewire::component('chat::participant-table', ChatParticipantTable::class);
        \Livewire::component('chat::permission-group-table', ChatPermissionGroupTable::class);
        \Livewire::component('chat::permission-group-user-table', ChatPermissionGroupUserTable::class);
        \Livewire::component('chat::permission-table', ChatPermissionTable::class);
        \Livewire::component('chat::table', ChatTable::class);
        \Livewire::component('chat::user-permission-table', ChatUserPermissionTable::class);
        \Livewire::component('chat::user-table', ChatUserTable::class);

        \Livewire::component('chat::category.channel.topic-item', TopicItem::class);
        \Livewire::component('chat::channel.topic.messages-chat-page', MessagesChatPage::class);

        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
