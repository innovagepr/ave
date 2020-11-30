<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Actions\Fortify\PasswordValidationRules;

class EditProfile extends Component
{
    use PasswordValidationRules;
    public $user;
    public $first = 'nombre puñeta';
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
