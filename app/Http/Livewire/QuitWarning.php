<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuitWarning extends Component
{
    public $sum;

    protected $listeners = ['refreshWarning'=>'refreshMe'];

    /**
     * RefreshMe
     * Refresh and renders the sum parameter in the submitWarning Modal in activities
     * @param $sum
     */
    public function refreshMe($sum){
        $this->sum = $sum;
    }

    /**
     * Render
     * Renders the view of the modal
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.quit-warning');
    }
}
