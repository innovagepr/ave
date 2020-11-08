<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class GroupManagement extends Component
{
    protected $rules = [
        'name' => 'required|max:128',
        'description' => 'required',
    ];
    protected $messages = [
        'name.required' => 'Favor proveer un nombre.',
        'name.max' => 'El nombre del grupo no puede exceder 128 caracteres.',
        'description.required' => 'Favor proveer una descripción.',

    ];
    public $tempDate;
    public $name;
    public $groupID = 2;
    public $selectedGroup;
    public $description;
    public $creationdate;
    public $members;
    public $active;
    public $headersGroups = array("Nombre", "Fecha de creación", "Cantidad de miembros", "Activo");
    public $headersStudents = array("Nombre", "Edad", "Nivel", "Grupo", "Activo");
    public $groups = array(array("id"=> 1,"name" => "Grupo 1", "description" => "Grupo de tutorías martes y jueves 4pm a 6pm", "creation-date" => "10/septiembre/2020", "members" =>4, "active"=> 1),
        array("id" => 2,"name" => "Grupo 2", "description" => "Grupo de prueba.", "creation-date" =>"1/septiembre/2020", "members" =>4, "active" => 0));
    public function render()
    {
        return view('livewire.group-management');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function resetOnClose()
    {
        $this->name="";
        $this->description="";
    }
    public function newModal(){
        $this->dispatchBrowserEvent('newModal');
    }
    public function clickGroup($groupName)
    {
        $this->selectedGroup = $groupName;
    }
    public function submitGroup()
    {
        $this->validate();
        $this->groupID++;
        array_push($this->groups, array("id" => $this->groupID, "name"=> $this->name, "description" => $this->description,  "creation-date"=> "6/noviembre/2020", "members" => 0, "active" => 1));
        $this->dispatchBrowserEvent('group-added');
        $this->resetOnClose();
    }
}
