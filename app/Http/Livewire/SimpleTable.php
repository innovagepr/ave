<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SimpleTable extends Component
{
    public $name = 'nombre';

    public function mount($name){

        $this -> name =  $name;
    }

    public function render()
    {
        return view('livewire.simple-table');
    }
}
