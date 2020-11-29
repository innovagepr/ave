<?php

namespace App\Http\Livewire;

use Livewire\Component;

/**
 * Class FinalResultsModal
 * @package App\Http\Livewire
 * Component that renders the Blade View of the modal appearing at the completion of the activity 1 (Letters).
 */
class FinalResultsModal extends Component
{

    public $badAnswers = [];
    public $sum;

    protected $listeners = ['refreshFinal'=>'refreshMe'];

    /**
     *
     * @param $someVariable
     * @param $othervar
     */
    public function refreshMe($badAnswers, $sum){
        $this->badAnswers = $badAnswers;
        $this->sum = $sum;
    }

    /**
     * Renders the Blade View of the modal
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.final-results-modal');
    }
}
