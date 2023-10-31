<div class="flex space-x-2 hover:bg-gray-100 py-1 px-2" x-data="{editing: false}">
    <div class="w-6/12 my-auto">
        <div x-show="!editing">
            @if($topic->created_at->diff(now())->i < 1)
                <i class="fas fa-edit text-blue-600 cursor-pointer my-auto mr-2" @click="editing = !editing"
                   title="Editar título"></i>
            @endif
            {{$topic->title}}</div>
        <div x-show="editing">
            <x-lte::form.input placeholder="titulo" wire:model="title" wire:keydown.prevent.enter="save"
                               @keydown.enter="editing = false"/>
        </div>
    </div>
    <div class="w-3/12 my-auto">
        {{$topic->created_at}}
        {{$topic->created_at->longRelativeDiffForHumans()}}
    </div>
    <div class="w-3/12 flex space-x-1 my-auto">
        <div class="relative my-auto">
            <x-dvui::notification text="{{$topic->messages()->count()}}" top left
                                  class="bg-blue-600 border-r border-b border-r-white text-white p-1"/>
            <a href="{{route('admin.chat.category.channel.topic.messages', $topic->id)}}"
               class="bg-blue-600 rounded py-1.5 px-2.5 my-auto">
                <i class="fas fa-comments text-white cursor-pointer" title="acompanhar conversa"></i>
            </a>
        </div>
        <x-dvui::button action="disable" confirm danger rounded sm class="my-auto">
            <i class="fas fa-trash cursor-pointer my-auto" title="remover"></i>
        </x-dvui::button>
    </div>
</div>
