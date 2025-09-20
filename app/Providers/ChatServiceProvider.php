<?php

declare(strict_types=1);

namespace Modules\Chat\Providers;

use Livewire;
use Modules\Base\Contracts\BaseServiceProviderContract;
use Modules\Chat\Livewire\Channel\Topic\MessagesChatPage;
use Modules\Chat\Livewire\Chat\TopicItem;

final class ChatServiceProvider extends BaseServiceProviderContract
{
    public function provides(): array
    {
        return [
            RouteServiceProvider::class,
            ChatEventServiceProvider::class,
        ];
    }

    public function getModuleName(): string
    {
        return 'Chat';
    }

    public function getModuleNameLower(): string
    {
        return 'chat';
    }

    public function requireModules(): array
    {
        return [
            'Post',
        ];
    }

    protected function registerComponents(): void
    {
        Livewire::component('chat::category.channel.topic-item', TopicItem::class);
        Livewire::component('chat::channel.topic.messages-chat-page', MessagesChatPage::class);
    }
}
