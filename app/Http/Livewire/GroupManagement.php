<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GroupManagement extends Component
{
    public function render()
    {
        return view('group.group-management');
    }
    public $groupCount = 2;
    public $testing = "cosa";
    protected $listeners = ['groupAdded' => 'incrementGroupCount'];
    public function incrementGroupCount(){
        $this->groupCount++;
    }
}
