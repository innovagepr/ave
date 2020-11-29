<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfile extends Component
{
    public $user;
    public $first = 'nombre puñeta';
    public $last;
    public $email;
    public $dob;
    public $debug = 'todavia';
    public $editIcon = 0;
    public $icon = 'images/profileIcons/icon-black.png';
    public $icons = array('images/profileIcons/icon-black.png',
        'images/profileIcons/icon-red.png',
        'images/profileIcons/icon-orange.png',
        'images/profileIcons/icon-yellow.png',
        'images/profileIcons/icon-green.png',
        'images/profileIcons/icon-blue.png',
        'images/profileIcons/icon-purple.png',
        'images/profileIcons/icon-pink.png');

    public function mount(){
        $this->user = auth()->user();
        $this->first = auth()->user()->first_name;
        $this->last = auth()->user()->last_name;
        $this->email = auth()->user()->email;
        $this->dob = auth()->user()->dob;

    }

    public function updateUser()
    {

        $this->user->first_name = $this->first;
        $this->user->last_name = $this->last;
        $this->user->email = $this->email;
        $this->user->dob = $this->dob;

        $this->user->save();
    }

    public function iconEdit(){
        $this->editIcon = 1;
        $this->dispatchBrowserEvent('edit-icon');

    }

    public function closeEditIcon(){
        $this->editIcon = 0;
        $this->dispatchBrowserEvent('saved-icon');

    }

    public function changeIcon($i){
        $this->icon = $i;

    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
