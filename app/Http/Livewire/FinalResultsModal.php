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
    public $joinedAnswer;
    public $word;

    public $correctAnswers=[];
    public $badAnswers=[];

    protected $listeners = ['refreshFinal'=>'refreshMe'];

    /**
     *
     * @param $someVariable
     * @param $othervar
     */
    public function refreshMe($someVariable,$othervar){
        $this->correctAnswers = $someVariable;
        $this->badAnswers = $othervar;
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
