<?php

namespace App\Http\Livewire;

use App\Rules\AgeProfessional;
use App\Rules\AgeChild;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Actions\Fortify\PasswordValidationRules;


class EditProfile extends Component
{
    use PasswordValidationRules;
    public $user;
    public $first;
    public $last;
    public $email;
    public $dob;
    public $debug = 'todavia';
    public $editIcon = 0;
    public $icon;
    public $icons = array(
        "0"=>"images/profileIcons/icon-black.png",
        "1"=>'images/profileIcons/icon-red.png',
        "2"=>'images/profileIcons/icon-orange.png',
        "4"=>'images/profileIcons/icon-green.png',
        "5"=>'images/profileIcons/icon-blue.png',
        "6"=>'images/profileIcons/icon-purple.png',
        "7"=>'images/profileIcons/icon-pink.png');
    public $password;
    public $password_confirmation;


    public function mount(){
        $this->user = auth()->user();
        $this->first = $this->user->first_name;
        $this->last = $this->user->last_name;
        $this->email = $this->user->email;
        $this->dob = $this->user->dob;
        $this->icon = $this->user->icon;

    }

    public function updateUser()
    {
        if($this->user->role_id == 1){
            $this->validate(['first' => 'required|string|max:128',
                'last' => 'required|string|max:128',
                'email' => 'required|string|max:255|unique:users',
                'dob' => 'required',
                'dob' => new AgeProfessional()],
                [
                    'first.required' => 'Favor proveer el nombre.',
                    'first.string' => 'El nombre debe contener letras.',
                    'first.max' => 'El nombre no puede exceder los 128 caracteres',
                    'last.required' => 'Favor proveer el apellido paterno',
                    'last.string' => 'El apellido paterno debe contener letras.',
                    'last.max' => 'El apellido paterno no puede exceder los 128 caracteres',
                    'email.required' => 'Favor proveer el correo electrónico.',
                    'email.string' => 'El correo electrónico debe contener letras.',
                    'email.max' => 'El correo electrónico no puede exceder los 255 caracteres',
                    'dob.required' => 'Favor proveer la fecha de nacimiento.'
                ]);
    }
        else{
            $this->validate(['first' => 'required|string|max:128',
                'last' => 'required|string|max:128',
                'email' => 'required|string|max:255|unique:users',
                'dob' => 'required',
                'dob' =>   new AgeChild()],
                [
                    'first.required' => 'Favor proveer el nombre.',
                    'first.string' => 'El nombre debe contener letras.',
                    'first.max' => 'El nombre no puede exceder los 128 caracteres',
                    'last.required' => 'Favor proveer el apellido paterno',
                    'last.string' => 'El apellido paterno debe contener letras.',
                    'last.max' => 'El apellido paterno no puede exceder los 128 caracteres',
                    'email.required' => 'Favor proveer el correo electrónico.',
                    'email.string' => 'El correo electrónico debe contener letras.',
                    'email.max' => 'El correo electrónico no puede exceder los 255 caracteres',
                    'dob.required' => 'Favor proveer la fecha de nacimiento.'
                ]);
        }
        $this->user->first_name = $this->first;
        $this->user->last_name = $this->last;
        $this->user->email = $this->email;
        $this->user->dob = $this->dob;
        $this->user->save();
        $this->first = $this->user->first_name;
        $this->last = $this->user->last_name;
        $this->email = $this->user->email;
        $this->dob = $this->user->dob;
        $this->dispatchBrowserEvent('finish-edit');
    }

    public function editPassword(){
        $this->dispatchBrowserEvent('edit-password');

    }

    public function savePassword(){
        $this->validate([ 'password' =>$this->passwordRules(), 'password_confirmation' => 'required']
            );
        $this->user->password = Hash::make($this->password);
        $this->user->save();
        $this->dispatchBrowserEvent('finish-edit-password');

    }

    public function iconEdit(){
        $this->editIcon = 1;
        $this->dispatchBrowserEvent('edit-icon');

    }

    public function closeEditIcon(){
        $this->editIcon = 0;
        $this->dispatchBrowserEvent('saved-icon');

    }

    public function closeConfirm(){
        $this->dispatchBrowserEvent('finish-edit-close');
    }

    public function changeIcon($i){
        $this->user->icon = $this->icons[$i];
        $this->icon = $this->icons[$i];
        $this->user->save();
        $this->user = $this->user->fresh();
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
