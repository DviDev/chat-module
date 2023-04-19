<div class="dark:text-gray-200 text-gray-800 px-4 space-y-1">
    <div class="space-x-1">
        <x-button href="{{route('admin.chat.category.channel.topic.message.files', $row->id)}}" label="files" teal/>
    </div>
    <div>Descrição: {{$row->description}}</div>
</div>
