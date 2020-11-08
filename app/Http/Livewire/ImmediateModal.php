<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImmediateModal extends Component
{
    public $joinedAnswer;
    public $answer;
    public $word;

    public function render()
    {
        return view('livewire.immediate-modal');
    }
}
