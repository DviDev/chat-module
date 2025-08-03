<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="participants" url="{{route('admin.chat.category.channel.participants', $row->id)}}" teal
                      class="px-2 py-1 pl-3"/>
        <x-dvui::link text="topics" url="{{route('admin.chat.category.channel.topics', $row->id)}}" teal
                      class="px-2 py-1"/>
        <x-dvui::link text="users" url="{{route('admin.chat.category.channel.users', $row->id)}}" teal
                      class="px-2 py-1 pr-3"/>
    </x-dvui::button.group>
    <div>Descrição: {{$row->description}}</div>
</div>
