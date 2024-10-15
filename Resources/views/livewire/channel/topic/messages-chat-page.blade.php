<x-lte::card :title="$topic->title" card_id="chat_topic_messages">
    <x-lte::card.header :navs="false">
        <div class="flex p-2 w-full">
            <div class="card-title grow">
                <div>{{$topic->title}}</div>
            </div>
            <div class="card-tools">
                <span title="{{$topic->messages()->count() .' '. __('New Messages')}} "
                      class="badge bg-success">{{$topic->messages()->count()}}</span>
                {{--<button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" title="Contacts"
                        data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>--}}
            </div>
        </div>
    </x-lte::card.header>
    <x-lte::card.body class="p-0 grow flex flex-col">
        <div class="p-2 border-bottom bg-gray-200 rounded-b-lg mb-1 text-gray-700"
             x-data="{editing: false}">
            <x-lte::form.input wire:model="topic_message" x-show="editing" style="display:none"
                               x-on:keydown.esc="editing=false" x-on:keydown.enter="editing=false"
                               wire:keydown.prevent.enter="saveTopicMessage"/>
            <div class="flex space-x-2 " x-show="!editing">
                <i class="fas fa-edit text-blue-600 ml-2 my-auto cursor-pointer" @click="editing=true"></i>
                <div class="my-auto ml-1">{!! $topic->message !!}</div>
            </div>
        </div>
        <div class="p-2 flex flex-col grow space-y-2">
            <!-- Conversations are loaded here -->
            @if(!$topic->trashed())
                <form wire:submit="sendMessage" class="">
                    <div class="input-group focus:outline-none focus:border-gray-300">
                        <input type="text" name="message" placeholder="digite a mensagem ..."
                               class="form-control border-gray-300 rounded-l focus:outline-none focus:border-gray-300"
                               wire:model="message">
                        <span class="input-group-append">
                                <button type="submit"
                                        class="bg-green-600 rounded-r text-white px-3 py-2 ring-0 border-0">Enviar</button>
                            </span>
                    </div>
                    <x-dvui::error field="message"/>
                </form>
            @endif

            {{--MESSAGES--}}
            <div class="direct-chat-messages grow bg-gray-50 rounded">
                @foreach($topic->messages()->orderByDesc('id')->get()->all() as $message)
                    <div @class(["mb-1", "text-right" => $message->user_id !== $topic->user->id])>
                        <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">
                                    {{$message->user->name .' ('.trans($message->user->type->name).')'}}
                                </span>
                            <span class="direct-chat-timestamp float-right">
                                    {{$message->created_at->format('d m H:i')}}
                                </span>
                        </div>
                        <div @class(["flex" => true,])>
                            @if(!$message->user->image_path)
                                <x-dvui::icon.user class="w-[30px] rounded"/>
                            @elseif(str($message->user->image_path)->contains('temp_seed_files'))
                                <x-dvui::icon.user class="w-[30px] rounded"/>
                            @else
                                <img class="direct-chat-img" src="{{asset($message->user->image_path)}}"
                                     alt="{{$message->user->name}}">
                            @endif

                            <div class="direct-chat-text">{{$message->message}}</div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!--/.direct-chat-messages-->

            <!-- PARTICIPANTS -->
            {{--<div class="direct-chat-contacts">
                <ul class="contacts-list">
                    @foreach($topic->channel->participants as $participant)
                        <li>
                            <a href="#">
                                <img class="contacts-list-img"
                                     src="{{asset('assets/modules/lte/dist/img/user1-128x128.jpg')}}" alt="{{$participant->user->name}}">
                                <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                    {{$participant->user->name}}
                                    <small class="contacts-list-date float-right">{{$participant->user->trashed() ? 'inativo' : 'ativo'}}</small>
                                </span>
                                    <span class="contacts-list-msg">{{$participant->user->type}}</span>
                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                    </li>
                    @endforeach
                </ul>
            </div>--}}
        </div>
    </x-lte::card.body>
    <x-lte::card.footer>

    </x-lte::card.footer>
    </form>

</x-lte::card>
