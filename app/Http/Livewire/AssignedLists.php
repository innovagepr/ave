<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use Livewire\Component;

class AssignedLists extends Component
{

    public $user;
    public $lists;

    public function mount(){
        $this->user = auth()->user();
        $this->lists = $this->user->assignedLists;
    }

    public function activityList($list, $act){

        if($act === Activity::where('slug', '=', 'letterOrdering')->first()->id){
            return redirect()->to('/lista/'.$list);
        }
        else {
            return redirect()->to('/lectura/'.$list);
        }

    }

    public function render()
    {
        return view('livewire.assigned-lists');
    }
}
