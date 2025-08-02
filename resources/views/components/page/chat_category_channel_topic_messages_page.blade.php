@pushonce('livewire_styles')
    @livewireStyles
@endpushonce
@pushonce('livewire_scripts')
    @livewireScripts
    @livewireScriptConfig
@endpushonce
<x-lte::layout.v1.page>
    <livewire:chat::channel.topic.messages-chat-page :topic="$topic"/>
</x-lte::layout.v1.page>
