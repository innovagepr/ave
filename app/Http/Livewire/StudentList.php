<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination;
    public $selectedGroup;
    public $studentToRemove;
    public $email;
    public $firstName;
    public $lastName;
    public $dob;
    public $headersStudents = array("Nombre", "Edad", "Nivel", "último acceso", "Eliminar");
    public function render()
    {
        return view('livewire.student-list', ['students' => $this->selectedGroup->members()->paginate(3)] );
    }
    public function resetOnClose(){
        $this->studentToRemove = "";
        $this->email = "";
        $this->firstName = "";
        $this->lastName = "";
        $this->dob = "";
    }
    /**
     * Sends a browser event to add a student.
     */
    public function newStudentModal(){
        $this->dispatchBrowserEvent('newStudentModal');
    }
    /**
     * Sends a browser event to add and register a new student.
     */
    public function regStudentModal(){
        $this->dispatchBrowserEvent('regModal');
    }
    public function removeStudentModal($selectedStudent){
        $this->studentToRemove = User::find($selectedStudent);
        $this->dispatchBrowserEvent('removeStudentModal');
    }
    /**
     * Removes a student depending on which area of the view it has been called.
     * @param $selectedStudent the student delete button that was selected.
     */
    public function removeStudent(){
        $this->selectedGroup->members()->detach($this->studentToRemove);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('student-removed');
    }
    public function calc_age($dob){
        $date = new Carbon($dob);
        return (int) $date->diffInYears();
    }
    /**
     * Adds a student to a group.
     */
    public function addStudent(){
        $this->validate(['email' => 'required|email|exists:users'],
            [
                'email.required' => 'Favor proveer un correo electrónico',
                'email.email' => 'Formato incorrecto para correo electrónico',
                'email.exists' => 'Usuario no existe en el sistema'
            ],
            ['email' => 'Correo electrónico']);
        $studentToAdd = User::where('email', '=', $this->email)->get();
        $group = Group::find($this->selectedGroup->id);
        $group->members()->attach($studentToAdd);
        $this->dispatchBrowserEvent('student-added');
        $this->resetOnClose();
    }

    /**
     * Adds and registers a student to a group.
     */
    public function registerStudent(){
        $this->validate(['firstName' => 'required|max:128',
            'lastName' => 'required|max:128',
            'dob' => 'required',
            'email' => 'required|email'],
            [
                'firstName.required' => 'Favor proveer un nombre.',
                'firstName.max' => 'El nombre no puede exceder 128 caracteres.',
                'lastName.required' => 'Favor proveer un apellido.',
                'lastName.max' => 'El apellido no puede exceder 128 caracteres.',
                'dob.required' => 'Favor proveer la fecha de nacimiento.',
                'email.required' => 'Favor proveer un correo electrónico',
                'email.email' => 'Formato incorrecto para correo electrónico'],
            ['firstName' => 'Nombre',
                'lastName' => 'Apellido',
                'dob' => 'Fecha de Nacimiento',
                'email' => 'Correo electrónico',]);
        $studentToAdd = new User;
        $studentToAdd->role_id = 2;
        $studentToAdd->first_name = $this->firstName;
        $studentToAdd->last_name = $this->lastName;
        $studentToAdd->email = $this->email;
        $studentToAdd->password = Hash::make('Aveduca21!');
        $studentToAdd->dob = $this->dob;
        $studentToAdd->active = 0;
        $studentToAdd->save();
        $this->selectedGroup->members()->attach($studentToAdd);
        $this->dispatchBrowserEvent('student-registered');
        $this->resetOnClose();
    }
}
