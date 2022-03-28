<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Member extends Component
{
    use LivewireAlert;

    public $members;
    public $group;

    public function mount()
    {
        $this->members = $this->group->users;
    }

    public function setNewAdmin($memberId)
    {
        $this->group->users()->updateExistingPivot($memberId,["is_admin"=>TRUE]);
        $this->alert("success","The new admin has been added to group",[
            'position' => "bottom-end"
        ]);
    }

    public function unSetAdmin($memberId)
    {
        if ($this->group->user_id == Auth::id()){
        $this->group->users()->updateExistingPivot($memberId,["is_admin"=>FALSE]);
        $this->alert("success","The admin become a normal member in a group",[
            'position' => "bottom-end"
        ]);
        }
    }

    public function render()
    {
        return view('livewire.member');
    }
}
