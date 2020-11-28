<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProSummary extends Component
{

    public $headersGroups = array("Nombre", "Activo");
    public $groups;
    public $headersStudents = array("Nombre", "Grupo", "Activo");
    public $selectedGroupName = 'Todos';
    public $selectedGroup = null;

    public function mount(){
        $this -> groups = auth()->user()->ownedGroups;
    }

    public function clickGroup($groupId)
    {
        if($this->selectedGroup) {
            if ($this->selectedGroup->id === $groupId) {
                $this->selectedGroup = null;
                $this->selectedGroupName = 'Todos';
            }
            else{
                $this->selectedGroup = Group::find($groupId);
                $this->selectedGroupName = $this->selectedGroup->name;
            }
        }
        else{
            $this->selectedGroup = Group::find($groupId);
            $this->selectedGroupName = $this->selectedGroup->name;
        }
    }

    public function render()
    {
        return view('livewire.pro-summary');
    }
}
