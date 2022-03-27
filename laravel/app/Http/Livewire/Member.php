<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;

class Member extends Component
{
    public $members;
    public $group;

    public function mount()
    {
        $this->members = $this->group->users;
    }

    public function render()
    {
        return view('livewire.member');
    }
}
