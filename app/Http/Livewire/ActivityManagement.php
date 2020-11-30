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
    public $activities = array(array("activity" => "Orden de Palabras"),
        array("activity" => "Lectura"));

    public function render()
    {
        return view('livewire.activity-management');
    }

}
