<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <x-dvui::button.group class="text-sm border dark:border-gray-500 dark:text-gray-400 divide-x divide-gray-500">
        <x-dvui::link text="categories" url="{{route('admin.chat.categories', $row->id)}}" teal class="rounded-l-md px-2 py-1"/>
        <x-dvui::link text="configs" url="{{route('admin.chat.configs', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="group.permissions" url="{{route('admin.chat.group.permissions', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="participants" url="{{route('admin.chat.participants', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="permissions" url="{{route('admin.chat.permissions', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="permission.groups" url="{{route('admin.chat.permission.groups', $row->id)}}" teal class="px-2 py-1"/>
        <x-dvui::link text="users" url="{{route('admin.chat.users', $row->id)}}" teal class="px-2 py-1 rounded-r-md"/>
    </x-dvui::button.group>
    <div>Descrição: {{$row->description}}</div>
</div>
