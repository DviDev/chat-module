<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="channels" url="{{route('admin.chat.category.channels', $row->id)}}" teal
                      class="rounded-l-md px-2 py-1"/>
        <x-dvui::link text="participants" url="{{route('admin.chat.category.participants', $row->id)}}" teal
                      class="rounded-r-md px-2 py-1"/>
    </x-dvui::button.group>
    <div>Descrição: {{$row->description}}</div>
</div>
