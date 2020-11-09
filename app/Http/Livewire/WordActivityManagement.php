<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WordActivityManagement extends Component
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
    public $firstName;
    public $lastName;
    public $age;
    public $nameToEdit;
    public $descToEdit;
    public $groupID = 1;
    public $selectedGroup;
    public $description;
    public $groupStudents = array();
    public $selectedGroupName;
    public $creationdate;
    public $members;
    public $email;
    public $studentToAddEmail = "orlando.rivera@home.e";
    public $active;
    public $headersGroups = array("Nombre", "Dificultad", "Cantidad", "Grupo", "Activa", "Eliminar");
    public $headersStudents = array("Palabra", "Activa", "Eliminar");
    public $groups = array(array("id"=> 0,"name" => "Default", "difficulty" => "Fácil", "quantity" => 40, "group" => "Todos", "active" => 1),
        array("id"=> 1,"name" => "Default", "difficulty" => "Medio", "quantity" => 49, "group" => "Todos", "active" => 1),
        array("id"=> 2,"name" => "Default", "difficulty" => "Difícil", "quantity" => 59, "group" => "Todos", "active" => 1),
        array("id"=> 3,"name" => "Lista1", "difficulty" => "Fácil", "quantity" => 4, "group" => "Grupo 1", "active" => 1),);
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
        $this->firstName="";
        $this->lastName="";
        $this->age="";
        $this->description="";
        $this->email="";
        $this->nameToEdit="";
        $this->descToEdit="";
    }
    public function newModal(){
        $this->dispatchBrowserEvent('newModal');
    }
    public function editModal(){
        $this->nameToEdit = $this->groups[$this->selectedGroup]['name'];
        $this->descToEdit = $this->groups[$this->selectedGroup]['description'];
        $this->dispatchBrowserEvent('editModal');
    }
    public function newStudentModal(){
        $this->dispatchBrowserEvent('newStudentModal');
    }
    public function regStudentModal(){
        $this->dispatchBrowserEvent('regModal');
    }
    public function clickGroup($groupNumber)
    {
        $this->selectedGroup = $groupNumber;
        $this->groupStudents = array();
        foreach($this->students as &$students)
        {
            if($students['id'] === $this->selectedGroup)
            {
                array_push($this->groupStudents, $students);
            }
        }
    }
    public function submitGroup()
    {
        $this->validate();
        $this->groupID++;
        array_push($this->groups, array("id" => $this->groupID, "name"=> $this->name, "description" => $this->description,  "creation-date"=> "6/noviembre/2020", "members" => 0, "active" => 1));
        $this->dispatchBrowserEvent('group-added');
        $this->resetOnClose();
    }
    public function editGroup()
    {
        $this->validate(['nameToEdit' => 'required|max:128',
            'descToEdit' => 'required'],
            [
                'nameToEdit.required' => 'Favor proveer un nombre.',
                'nameToEdit.max' => 'El nombre del grupo no puede exceder 128 caracteres.',
                'descToEdit.required' => 'Favor proveer una descripción.',
            ],
            ['nameToEdit' => 'Name to Edit',
                'descToEdit' => 'Description to Edit']);
        $this->groups[$this->selectedGroup]['name'] = $this->nameToEdit;
        $this->groups[$this->selectedGroup]['description'] = $this->descToEdit;
        $this->dispatchBrowserEvent('group-edited');
        $this->resetOnClose();
    }
    public function addStudent(){
        $this->validate(['email' => 'required|email'],
            [
                'email.required' => 'Favor proveer un correo electrónico',
                'email.email' => 'Formato incorrecto para correo electrónico',
            ],
            ['email' => 'Correo electrónico']);
        $studentToAdd = array("id" => $this->selectedGroup, "name" => "Orlando Rivera", "age" => 9, "level" => "Nivel 2", "last-access" => "10/noviembre/2020", "active" => 1);
        array_push($this->students, $studentToAdd);
        array_push($this->groupStudents, $studentToAdd);
        $this->dispatchBrowserEvent('student-added');
        $this->resetOnClose();
    }
    public function registerStudent()
    {
        $this->validate(['firstName' => 'required|max:128',
            'lastName' => 'required|max:128',
            'age' => 'required|numeric',
            'email' => 'required|email'],
            [
                'firstName.required' => 'Favor proveer un nombre.',
                'firstName.max' => 'El nombre no puede exceder 128 caracteres.',
                'lastName.required' => 'Favor proveer un apellido.',
                'lastName.max' => 'El apellido no puede exceder 128 caracteres.',
                'age.required' => 'Favor proveer la edad.',
                'age.numeric' => 'La edad debe ser un número.',
                'email.required' => 'Favor proveer un correo electrónico',
                'email.email' => 'Formato incorrecto para correo electrónico'],
            ['firstName' => 'Nombre',
                'lastName' => 'Apellido',
                'age' => 'Edad',
                'email' => 'Correo electrónico',]);
        $this->firstName .= " ";
        $this->firstName .= $this->lastName;
        $studentToAdd = array("id" => $this->selectedGroup, "name" => $this->firstName,
            "age" => $this->age, "level" => "Nivel 1", "last-access" => "10/noviembre/2020", "active" => 1);
        array_push($this->students, $studentToAdd);
        array_push($this->groupStudents, $studentToAdd);
        $this->dispatchBrowserEvent('student-registered');
        $this->resetOnClose();
    }
}
