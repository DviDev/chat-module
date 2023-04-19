<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.chat.category.channels', $row->id)}}" label="channels" teal/>
        <x-button href="{{route('admin.chat.category.participants', $row->id)}}" label="participants" teal/>
    </div>
    <div>Descrição: {{$row->description}}</div>
</div>
