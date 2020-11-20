<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AudioApi extends Component
{
    public $word;
    public $word2;

    protected $listeners = ['refreshAudio'=>'refreshAudio'];

    public function refreshAudio($someVariable){
        $this->word2 = $someVariable;
        $this->dispatchBrowserEvent('refreshAudio', ['newName' => $someVariable]);
    }

    public function mount($word){
        $this->word2 = $word;
    }

    public function render()
    {
        return view('livewire.audio-api');
    }

//    public function togglePlay(){
//        audio.play();
//    }

}
