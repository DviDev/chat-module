<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.chat.category.channel.participants', $row->id)}}" label="participants" teal/>
        <x-button href="{{route('admin.chat.category.channel.topics', $row->id)}}" label="topics" teal/>
        <x-button href="{{route('admin.chat.category.channel.users', $row->id)}}" label="users" teal/>
    </div>
    <div>Descrição: {{$row->description}}</div>
</div>
