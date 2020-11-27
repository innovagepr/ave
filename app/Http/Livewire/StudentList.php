<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use App\Rules\AgeChild;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination;
    public $selectedGroup;
    public $studentToRemove;
    public $studentToToggle;
    public $slot;
    public $altSlot;
    public $email;
    public $provisionalPassword;
    public $provisionalEmail;
    public $firstName;
    public $lastName;
    public $dob;
    public $headersStudents = array("Nombre", "Edad", "Nivel", "Activo", "último acceso", "Eliminar");
    public function render()
    {
        return view('livewire.student-list', ['students' => $this->selectedGroup->members()->paginate(3)] );
    }
    public function resetOnClose(){
        $this->studentToRemove = "";
        $this->studentToToggle = "";
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

    public function toggleStudentModal($selectedStudent){
$this->studentToToggle = User::find($selectedStudent);
if( $this->studentToToggle->active === 1){
    $this->slot = "desactivar";
    $this->altSlot = "activar";
}
else{
    $this->slot = "activar";
    $this->altSlot = "desactivar";
}
$this->dispatchBrowserEvent('toggleStudentModal');
    }
    public function toggleStudent(){
        if( $this->studentToToggle->active === 1){
            $this->studentToToggle->active = 0;
            $this->studentToToggle->save();
        }
        else{
            $this->studentToToggle->active = 1;
            $this->studentToToggle->save();
        }
        $this->dispatchBrowserEvent('student-toggled');
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
            'dob' => 'required', 'dob' => new AgeChild()],
            [
                'firstName.required' => 'Favor proveer un nombre.',
                'firstName.max' => 'El nombre no puede exceder 128 caracteres.',
                'lastName.required' => 'Favor proveer un apellido.',
                'lastName.max' => 'El apellido no puede exceder 128 caracteres.',
                'dob.required' => 'Favor proveer la fecha de nacimiento.',
                'dob.AgeChild()' => 'Niño debe tener edad entre 8 y 10 años.'],
            ['firstName' => 'Nombre',
                'lastName' => 'Apellido',
                'dob' => 'Fecha de Nacimiento',]);
        if(Role::find(2) == null)
        {
            $role = new Role;
            $role->id = 2;
            $role->name = 'Estudiante';
            $role->slug = 'child';
            $role->save();
        }
        $studentToAdd = new User;
        $studentToAdd->role_id = 2;
        $studentToAdd->first_name = $this->firstName;
        $studentToAdd->last_name = $this->lastName;
        $this->provisionalEmail = "estudianteProvisional";
        $maxId = User::get()->max('id');
        $maxId++;
        $this->provisionalEmail .= $maxId;
        $studentToAdd->email = $this->provisionalEmail;
        $this->provisionalPassword = Str::random(10);
        $studentToAdd->password = Hash::make($this->provisionalPassword);
        $studentToAdd->dob = $this->dob;
        $studentToAdd->active = 0;
        $studentToAdd->save();
        $this->selectedGroup->members()->attach($studentToAdd);
        $this->dispatchBrowserEvent('student-registered');
        $this->resetOnClose();
    }
}
