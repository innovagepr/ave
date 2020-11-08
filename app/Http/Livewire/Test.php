<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $name = 'Jelly';
    public $creationdate;
    public $members;
    public $active;
    public $headersGroups = array("Nombre", "Fecha de creación", "Cantidad de miembros", "Activo");
    public $groups = array(array("name" => "Grupo 1", "creation-date" => "10/septiembre/2020", "members" =>4, "active"=> 1),
                    array("name" => "Grupo 2", "creation-date" =>"1/septiembre/2020", "members" =>4, "active" => 0));
    public function render()
    {
        return view('livewire.test');
    }

    public function submitGroup()
    {
        array_push($this->groups, array("name"=> $this->name, "creation-date"=> $this->creationdate, "members" => $this->members, "active" => $this->active));
    }
}
