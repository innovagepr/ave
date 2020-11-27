<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditProfile extends Component
{
    public $user;
    public $first, $last, $email, $dob;

    public function mount(){
        $this->user = auth()->user();
//        $this->first =
    }

    public function updateUser()
    {

        auth()->user()->first_name = 'Nombre';
        auth()->user()->save;
//        $this->validate();
////        $this->groupID++;
////        array_push($this->groups, array("id" => $this->groupID, "name"=> $this->name, "description" => $this->description,  "creation-date"=> "6/noviembre/2020", "members" => 0, "active" => 1));
//        $this->dispatchBrowserEvent('group-added');
//        $this->resetOnClose();
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
