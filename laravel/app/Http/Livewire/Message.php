<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Message extends Component
{
    public $user ;
    public $messages = [];
    public $text;

    public function replay()
    {
        if (!isset($this->text) || empty($this->text)){
            return;
        }

        $message = \App\Models\Message::create([
            "text" => $this->text,
            "user_id" =>\auth()->user()->id
        ]);

        $message->users()->attach($this->user->id);

        $this->text = "";
    }

    /**
     * @param $messages
     * @param Collection $ownMessages
     * @return array
     */
    public function filterMessageUsers($messages, Collection $ownMessages): array
    {
        $messages = collect($messages)->concat($ownMessages)->sortBy([
            "created_at", "asc"
        ])->filter()->flatten()->all();

        return $messages;
    }

    /**
     * @param User $user
     * @param $ownUserTexts
     * @return Collection
     */
    public function getMessagesUser(User $user, $ownUserTexts): Collection
    {
        $ownMessages = $user->messages()->whereIn("message_id",
            $ownUserTexts->pluck("id")->toArray())->get();

        return $ownMessages;
    }

    public function render()
    {
        $messages = $this->user->texts;

        $ownUserTexts =  \auth()->user()->texts;

        $messages = $this->getMessagesUser(\auth()->user(), $messages);

        $ownMessages = $this->getMessagesUser($this->user, $ownUserTexts);

        $this->messages = $this->filterMessageUsers($messages, $ownMessages);

        return view('livewire.message');
    }
}
