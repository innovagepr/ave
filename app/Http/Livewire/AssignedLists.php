<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AssignedLists extends Component
{

    public $user;
    public $lists;

    public function mount(){
        $this->user = auth()->user();
        $this->lists = $this->user->assignedLists;
    }

    public function render()
    {
        return view('livewire.assigned-lists');
    }
}
