<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChildSummary extends Component
{

    public $marginLeft = 'main-block-normal';
    public $points = '89';
    public $level = '1';
    public $coins = '0';
    public $petLevel = '1';

    protected $listeners = ['changeMarginLeft' => 'extraML'];

    public function render()
    {
        return view('livewire.child-summary');
    }

    public function extraML(){
        $this -> marginLeft = 'main-block-aside';
    }

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @param string $level
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getPoints(): string
    {
        return $this->points;
    }

    /**
     * @param string $points
     */
    public function setPoints(string $points): void
    {
        $this->points = $points;
    }
}
