<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ImmediateModalGood extends Component
{
    public $joinedAnswer;
    public $word;

    protected $listeners = ['refreshGoodModal'=>'refreshGood'];

    public function refreshGood($someVariable,$othervar){
        $this->joinedAnswer = $someVariable;
        $this->word = $othervar;
    }

    public function render()
    {
        return view('livewire.immediate-modal-good');
    }
}
