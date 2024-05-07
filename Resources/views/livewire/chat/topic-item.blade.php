<div
    @class(["flex space-x-2 hover:bg-gray-100 py-1 px-2", 'bg-red-100' => $topic->wasRecentlyCreated])
    x-data="{editing: false}">
    <div class="w-9/12 my-auto">
        <div x-show="!editing">
            @if($topic->created_at->diff(now())->i < 1)
                <i class="fas fa-edit text-blue-600 cursor-pointer my-auto mr-2" @click="editing = !editing"
                   title="Editar título"></i>
            @endif
            <div class="flex space-x-1">
                @if($img = $topic->user->image_path)
                    @if(str($img)->contains('http') || File::exists(public_path($img)))
                        <img src="{{$img}}" width="50px" height="50px" class="border rounded my-auto">
                    @endif
                @else
                    <x-dvui::icon.user/>
                @endif
                <div class="">
                    <div
                        class="text-[10px] leading-none font-bold text-gray-500">{{str($topic->user->name)->upper()}}</div>
                    <div
                        title="{{$topic->created_at->format(config('base.date_format'). ' '.config('base.time_format'))}}"
                        data-te-toggle="tooltip"
                        class="text-[10px] text-gray-500 leading-none">
                        {{$topic->created_at->longRelativeDiffForHumans()}}
                    </div>
                    <div class="font-bold text-gray-700">{{$topic->title}}</div>
                </div>

            </div>
        </div>
        <div x-show="editing">
            <x-lte::form.input placeholder="titulo" wire:model="title" wire:keydown.prevent.enter="save"
                               @keydown.enter="editing = false"/>
        </div>
    </div>
    <div class="w-3/12 flex space-x-1 my-auto">
        <div class="relative my-auto">
            <x-dvui::notification text="{{$topic->messages()->count()}}" top left title="total de mensagens"
                                  class="bg-blue-600 border-r border-b border-r-white text-white p-1"/>
            <a href="{{route('admin.chat.category.channel.topic.messages', $topic->id)}}"
               class="bg-blue-600 rounded py-1.5 px-2.5 my-auto">
                <i class="fas fa-comments text-white cursor-pointer" title="acompanhar conversa"></i>
            </a>
        </div>
        @if($topic->trashed())
            @if(config('app.env') == 'local' || ($topic->user_id == auth()->user()->id && $topic->messages()->count() > 0))
                <x-dvui::button action="forceDelete" title="forçar remoção" confirm danger rounded sm class="my-auto">
                    <i class="fas fa-trash cursor-pointer my-auto"></i>
                </x-dvui::button>
            @else
                <i class="fas fa-trash-alt fa-2x text-gray-400 ml-2 cursor-pointer my-auto"
                   title="tópico arquivado"></i>
            @endif
        @else
            <x-dvui::button action="disable" confirm warning rounded sm class="my-auto" title="Desabilitar">
                <i class="fas fa-trash cursor-pointer my-auto" title="remover"></i>
            </x-dvui::button>
        @endif
    </div>
</div>
