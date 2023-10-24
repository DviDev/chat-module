<?php

namespace Modules\Chat\Livewire\Channel\Topic;

use Livewire\Component;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;

class MessagesChatPage extends Component
{
    /**@var ChatCategoryChannelTopicModel*/
    public $topic;
    public $message;

    public function render()
    {
        return view('chat::livewire.channel.topic.messages-chat-page');
    }

    public function sendMessage()
    {
        $this->validate(rules:['message' => 'required']);
        $this->topic->messages()->create(['message' => $this->message, 'user_id' => auth()->user()->id]);
        $this->message = null;
    }
}
