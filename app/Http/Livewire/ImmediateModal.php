<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImmediateModal extends Component
{
    public $joinedAnswer;
    public $word;

    protected $listeners = ['refreshChildren'=>'refreshMe'];

    public function refreshMe($someVariable,$othervar){
        $this->joinedAnswer = $someVariable;
        $this->word = $othervar;
    }

    public function render()
    {
        return view('livewire.immediate-modal');
    }
}
