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
    public $tableActive;
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
    public $studentID = 7;
    public $studentToAddEmail = "orlando.rivera@home.e";
    public $active = true;
    public $headersGroups = array("Nombre", "Fecha de creación", "Cantidad de miembros", "Activo", "Eliminar");
    public $headersStudents = array("Nombre", "Edad", "Nivel", "Grupo", "Activo", "Eliminar");
    public $groups = array(array("id"=> 0,"name" => "Grupo 1", "description" => "Grupo de tutorías martes y jueves 4pm a 6pm", "creation-date" => "10/septiembre/2020", "members" =>4, "active"=> 1, "deleted" => 0),
        array("id" => 1,"name" => "Grupo 2", "description" => "Grupo de prueba.", "creation-date" =>"1/septiembre/2020", "members" =>4, "active" => 0, "deleted" => 0));
    public $students = array(array("id" => 0, "groupID" => 0, "name" => "Miguel Rivera", "age" => 8, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 1, "deleted" => 0),
        array("id" => 1, "groupID" => 0, "name" => "Laura Perez", "age" => 10, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 0, "deleted" => 0),
        array("id" => 2, "groupID" => 0, "name" => "María Vázquez", "age" => 8, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 1, "deleted" => 0),
        array("id" => 3, "groupID" => 0, "name" => "Pedro Colón", "age" => 9, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 1, "deleted" => 0),
        array("id" => 4, "groupID" => 1, "name" => "Manuel Díaz", "age" => 9, "level" => "Nivel 2", "last-access" => "12/octubre/2020", "active" => 1, "deleted" => 0),
        array("id" => 5, "groupID" => 1, "name" => "Antonio Morales", "age" => 10, "level" => "Nivel 2", "last-access" => "15/octubre/2020", "active" => 1, "deleted" => 0),
        array("id" => 6, "groupID" => 1, "name" => "Andrea Carro", "age" => 9, "level" => "Nivel 2", "last-access" => "18/octubre/2020", "active" => 0, "deleted" => 0),
        array("id" => 7, "groupID" => 1,"name" => "Gabriel Lozada", "age" => 10, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 1, "deleted" => 0));

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
        $this->active=true;
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
    public function newTestModal($modalID)
    {
        $this->dispatchBrowserEvent('newTestModal', ['modalID' => $modalID]);
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
            if(array_key_exists($groupNumber, $this->students) && $students['groupID'] === $this->selectedGroup) {
                array_push($this->groupStudents, $students);
            }
        }
    }
    public function submitGroup()
    {
        $this->validate();
        $this->groupID++;
        array_push($this->groups, array("id" => $this->groupID, "name"=> $this->name, "description" => $this->description,  "creation-date"=> "6/noviembre/2020", "members" => 0, "active" => 1, "deleted" => 0));
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
        if($this->active === true)
        {
            $this->groups[$this->selectedGroup]['active'] = 1;
        }
        else
        {
            $this->groups[$this->selectedGroup]['active'] = 0;
        }
        $this->dispatchBrowserEvent('group-edited');
        $this->resetOnClose();
    }
    public function removeGroup($selectedGroup){
        $this->tableActive = 0;
        $this->groups[$selectedGroup]['deleted'] = 1;
    }
    public function removeStudent($selectedStudent){
        $this->groupStudents[$selectedStudent]['deleted'] = 1;
        $this->students[$selectedStudent]['deleted'] = 1;
    }
    public function addStudent(){
        $this->validate(['email' => 'required|email'],
            [
                'email.required' => 'Favor proveer un correo electrónico',
                'email.email' => 'Formato incorrecto para correo electrónico',
            ],
            ['email' => 'Correo electrónico']);
        $this->studentID++;
        $studentToAdd = array("id" => $this->studentID, "groupID" => $this->selectedGroup, "name" => "Orlando Rivera", "age" => 9, "level" => "Nivel 2", "last-access" => "10/noviembre/2020", "active" => 1, "deleted" => 0);
        array_push($this->students, $studentToAdd);
        array_push($this->groupStudents, $studentToAdd);
        $this->dispatchBrowserEvent('student-added');
        $this->resetOnClose();
    }
    public function registerStudent(){
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
        $this->studentID++;
        $this->firstName .= " ";
        $this->firstName .= $this->lastName;
        $studentToAdd = array("id" => $this->studentID, "groupID" => $this->selectedGroup, "name" => $this->firstName,
            "age" => $this->age, "level" => "Nivel 1", "last-access" => "10/noviembre/2020", "active" => 1, "deleted" => 0);
        array_push($this->students, $studentToAdd);
        array_push($this->groupStudents, $studentToAdd);
        $this->dispatchBrowserEvent('student-registered');
        $this->resetOnClose();
    }
}
