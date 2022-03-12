<?php

namespace App\Http\Livewire;

use App\Trait\Searchable;
use Livewire\Component;

class Search extends Component
{
    use Searchable;

    public $users = [];

    public $search;

    public function mount()
    {
    }

    public function searchFor()
    {
        if (!empty($this->search)){
            $this->users = $users =  $this->search($this->search);
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
