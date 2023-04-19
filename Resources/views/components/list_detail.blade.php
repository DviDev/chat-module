<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.chat.categories', $row->id)}}" label="categories" teal/>
        <x-button href="{{route('admin.chat.configs', $row->id)}}" label="configs" teal/>
        <x-button href="{{route('admin.chat.group.permissions', $row->id)}}" label="group.permissions"
                  teal/>
        <x-button href="{{route('admin.chat.participants', $row->id)}}" label="participants" teal/>
        <x-button href="{{route('admin.chat.permissions', $row->id)}}" label="permissions" teal/>
        <x-button href="{{route('admin.chat.permission.groups', $row->id)}}" label="permission.groups"
                  teal/>
        <x-button href="{{route('admin.chat.users', $row->id)}}" label="users" teal/>
    </div>
    <div>Descrição: {{$row->description}}</div>
</div>
