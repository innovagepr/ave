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

    public function mount(){
        $this -> groups = auth()->user()->ownedGroups;
    }

    public function render()
    {
        return view('livewire.pro-summary');
    }
}
