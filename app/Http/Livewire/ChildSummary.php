<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChildSummary extends Component
{

    public $points;
    public $petPoints;
    public $level;
    public $coins;
    public $petLevel;
    public $nextPoints;
    public $nextPetPoints;
    public $lastActivity = null;
    public $maxLevel;
    public $maxPetLevel;

    public function mount(){
        $this->points = auth()->user()->points;
        $this->coins = auth()->user()->coins;
        $this->level = auth()->user()->level;
        $this->petLevel = auth()->user()->pet->level;
        $this->petPoints = $this->points/2;

        $this->nextPoints = (20*$this->level)-$this->points;
        $this->nextPetPoints = (20*$this->petLevel)-$this->petPoints;

        $this->maxLevel = $this->level*20;
        $this->maxPetLevel = $this->petLevel*20;

    }


    public function render()
    {
        return view('livewire.child-summary');
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
