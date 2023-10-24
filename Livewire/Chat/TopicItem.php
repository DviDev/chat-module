<?php

namespace Modules\Chat\Livewire\Chat;

use Livewire\Component;
use Modules\Chat\Models\ChatCategoryChannelTopicModel;
use Modules\DvUi\Services\Plugins\Toastr\Toastr;

class TopicItem extends Component
{
    /**@var ChatCategoryChannelTopicModel*/
    public $topic;
    public $title;
    public $message;

    public function mount()
    {
        $this->title = $this->topic->title;
        $this->message = $this->topic->message;
    }

    public function render()
    {
        return view('chat::livewire.chat.topic-item');
    }

    public function save()
    {
        $this->topic->title = $this->title;
        $this->topic->save();

        Toastr::instance($this)->success('Item salvo');
    }
}
