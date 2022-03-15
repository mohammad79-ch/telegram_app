<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $group;
    public $messages = [];
    public $text;

    public function chat()
    {
        if (!isset($this->text) || empty($this->text)){
            return;
        }

       $message =  auth()->user()->texts()->create([
            "text" => $this->text
        ]);

        $message->groups()->attach($this->group->id);

        $this->text = "";
    }

    public function render()
    {
        $this->messages = $this->group->messages;

        return view('livewire.chat');
    }
}
