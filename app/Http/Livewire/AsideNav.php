<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AsideNav extends Component
{
    public $displayAside = 'hidden';

    protected $listeners = ['showAside' => 'show', 'hideAside' => 'hide'];


    public function show(){
        $this -> displayAside = 'block';
    }

    public function hide(){
        $this -> displayAside = 'hidden';
        $this -> emit('showTop');
    }

    public function render()
    {
        return view('livewire.aside-nav');
    }
}
