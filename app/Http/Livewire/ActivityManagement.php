<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActivityManagement extends Component
{

    public $name;
    public $creationdate;
    public $members;
    public $active;
    public $headersActivities = array("Actividad", "Editar");
    public $activities = array(array("activity" => "Palabras"),
        array("activity" => "Lectura"));

    public function render()
    {
        return view('livewire.activity-management');
    }

    public function submitGroup()
    {
        array_push($this->groups, array("name"=> $this->name, "creation-date"=> "4/noviembre/2020", "members" => 0, "active" => 1));
        $this->name="";
        $this->dispatchBrowserEvent('group-added');
    }
}
