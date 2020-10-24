<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TopNav extends Component
{

    public $displayTop = 'block';

    protected $listeners = ['showTop' => 'show', 'hideTop' => 'hide'];

    public function show(){
        $this -> displayTop = 'block';
    }

    public function hide() {
        $this -> displayTop = 'hidden';
        $this -> emit('showAside');
    }

    public function render()
    {
        return view('livewire.top-nav');
    }
}
