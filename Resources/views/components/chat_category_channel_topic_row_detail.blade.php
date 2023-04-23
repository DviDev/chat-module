<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="files" url="{{route('admin.chat.category.channel.topic.files', $row->id)}}" teal
                      class="px-2 py-1 pl-3"/>
        <x-dvui::link text="messages" url="{{route('admin.chat.category.channel.topic.messages', $row->id)}}" teal
                      class="px-2 py-1 pr-3"/>
    </x-dvui::button.group>
    <div>Descrição: {{$row->description}}</div>
</div>
