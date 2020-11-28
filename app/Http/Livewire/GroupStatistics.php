<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Group;

class GroupStatistics extends Component
{
    use WithPagination;
    public $selectedGroup;
    public $group;
    public $headersStudents = array("Nombre", "Accesos");
    public function render()
    {
        return view('livewire.group-statistics', ['students' => Group::find($this->selectedGroup)->members()->paginate(3)] );
    }

    public function mount(){
        $this->group = Group::find($this->selectedGroup);
    }

}
