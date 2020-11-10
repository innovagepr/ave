<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WordActivityManagement extends Component
{
    protected $rules = [
        'name' => 'required|max:128',
    ];
    protected $messages = [
        'name.required' => 'Favor proveer un nombre.',
        'name.max' => 'El nombre del grupo no puede exceder 128 caracteres.',
    ];
    public $tempDate;
    public $name;
    public $tableActive;
    public $firstName;
    public $lastName;
    public $age;
    public $difficulty = "Fácil";
    public $nameToEdit;
    public $diffToEdit;
    public $groupID = 3;
    public $selectedGroup;
    public $description;
    public $groupStudents = array();
    public $selectedGroupName;
    public $creationdate;
    public $members;
    public $email;
    public $studentID = 7;
    public $active = true;
    public $headersGroups = array("Nombre", "Dificultad", "Cantidad", "Grupo", "Activa", "Eliminar");
    public $headersStudents = array("Palabra", "Activa", "Eliminar");
    public $groups = array(array("id"=> 0,"name" => "Default", "difficulty" => "Fácil", "quantity" => 40, "group" => "Todos", "active" => 1, "deleted" => 0),
        array("id"=> 1,"name" => "Default", "difficulty" => "Medio", "quantity" => 49, "group" => "Todos", "active" => 1, "deleted" => 0),
        array("id"=> 2,"name" => "Default", "difficulty" => "Difícil", "quantity" => 59, "group" => "Todos", "active" => 1, "deleted" => 0),
        array("id"=> 3,"name" => "Lista1", "difficulty" => "Fácil", "quantity" => 4, "group" => "Grupo 1", "active" => 1, "deleted" => 0));
    public $students = array(array("id" => 3, "word" => "hora", "active" => 1),
                             array("id" => 3, "word" => "piano", "active" => 1),
                             array("id" => 3, "word" => "papel", "active" => 1),
                             array("id" => 3, "word" => "lata", "active" => 1));

    public function render()
    {
        return view('livewire.word-activity-management');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function resetOnClose()
    {
        $this->name="";
        $this->difficulty="Fácil";
        $this->description="";
        $this->nameToEdit="";
        $this->diffToEdit="";
    }
    public function newModal(){
        $this->dispatchBrowserEvent('newModal');
    }
    public function editModal(){
        $this->nameToEdit = $this->groups[$this->selectedGroup]['name'];
        $this->diffToEdit = $this->groups[$this->selectedGroup]['difficulty'];
        $this->dispatchBrowserEvent('editModal');
    }
    public function newStudentModal(){
        $this->dispatchBrowserEvent('newStudentModal');
    }
    public function regStudentModal(){
        $this->dispatchBrowserEvent('regModal');
    }
    public function removeGroup($selectedGroup){
        $this->tableActive = 0;
        $this->groups[$selectedGroup]['deleted'] = 1;
    }
    public function removeStudent($selectedStudent){
        $this->groupStudents[$selectedStudent]['deleted'] = 1;
        $this->students[$selectedStudent]['deleted'] = 1;
    }
    public function clickGroup($groupNumber)
    {
        if($this->tableActive === 1 && $this->selectedGroup === $groupNumber)
        {
            $this->tableActive = 0;
            $this->groupStudents = array();
        }
        else
        {
            $this->selectedGroup = $groupNumber;
            $this->groupStudents = array();
            $this->tableActive = 1;

        }
        foreach($this->students as &$students)
        {
            if(array_key_exists($groupNumber, $this->students) && $students['id'] === $this->selectedGroup) {
                array_push($this->groupStudents, $students);
            }
        }
    }
    public function submitGroup()
    {
        $this->validate();
        $this->groupID++;
        array_push($this->groups, array("id"=> $this->groupID,"name" => $this->name,
            "difficulty" => $this->difficulty, "quantity" => 0, "group" => " ", "active" => 1, "deleted" => 0));
        $this->dispatchBrowserEvent('group-added');
        $this->resetOnClose();
    }
    public function editGroup()
    {
        $this->validate();
        $this->groups[$this->selectedGroup]['name'] = $this->nameToEdit;
        $this->groups[$this->selectedGroup]['difficulty'] = $this->diffToEdit;
        $this->dispatchBrowserEvent('group-edited');
        $this->resetOnClose();
    }

}
