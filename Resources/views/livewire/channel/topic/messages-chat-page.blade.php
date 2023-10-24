<x-lte::card :title="$topic->title">
    <x-lte::card.header :navs="false">
        <div class="flex">
            <a href="{{url()->previous()}}" class="border rounded border-gray-200 px-2 py-1">
                <x-dvui::icon.arrow.left class="my-auto"/>
            </a>

            <span class="card-title grow flex justify-content-center">{{$topic->title}}</span>
            <div class="card-tools">
                <span title="3 New Messages" class="badge bg-success">{{$topic->messages()->count()}}</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" title="Contacts"
                        data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </x-lte::card.header>
    <form wire:submit="sendMessage">
        <x-lte::card.body>
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
                @foreach($topic->messages()->orderBy('id', 'desc')->get()->all() as $message)
                    <div @class(["direct-chat-msg", "right" => $message->user_id !== auth()->user()->id])>
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">{{$message->user->name}}</span>
                            <span
                                class="direct-chat-timestamp float-right">{{$message->created_at->format('d m H:i')}}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{asset('dist/img/user1-128x128.jpg')}}"
                             alt="{{$message->user->name}}">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            {{$message->message}}
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                @endforeach
            </div>
            <!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
                <ul class="contacts-list">
                    <li>
                        <a href="#">
                            <img class="contacts-list-img"
                                 src="{{asset('dist/img/user1-128x128.jpg')}}"
                                 alt="User Avatar">

                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                <span class="contacts-list-msg">How have you been? I was...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                        </a>
                    </li>
                    <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
            </div>
            <!-- /.direct-chat-pane -->
        </x-lte::card.body>
        <x-lte::card.footer>
            <form action="#" method="post">
                <div class="input-group">
                    <input type="text" name="message" placeholder="digite a mensagem ..."
                           class="form-control border-gray-300 rounded-l" wire:model="message">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-success">Enviar</button>
                    </span>
                </div>
                <x-dvui::error field="message"/>
            </form>
        </x-lte::card.footer>
    </form>
</x-lte::card>
