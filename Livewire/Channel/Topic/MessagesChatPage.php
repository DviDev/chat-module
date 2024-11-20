<?php

namespace Modules\Chat\Livewire\Channel\Topic;

use Livewire\Component;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;
use Modules\DvUi\Services\Plugins\Toastr\Toastr;

class MessagesChatPage extends Component
{
    /**@var ChatCategoryChannelTopicModel*/
    public $topic;
    public $message;
    public $topic_message;

    public function mount()
    {
//        $this->topic_message = $this->topic->message;
        $this->topic_message = $this->topic->thread();
    }

    public function render()
    {
        return view('chat::livewire.channel.topic.messages-chat-page');
    }

    public function sendMessage()
    {
        $this->validate(rules:['message' => 'required']);
        $this->topic->threads()->create([
                'content' => $this->message,
                'user_id' => auth()->user()->id]
        );
        $this->message = null;
    }

    public function saveTopicMessage()
    {
        $this->topic->message = $this->topic_message;
        $this->topic->save();
        Toastr::instance($this)->success('Item salvo');
    }
}
