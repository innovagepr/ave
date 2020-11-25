<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Group;
use Illuminate\Support\Collection;
use Livewire\Component;

class Statistics extends Component
{
    public $option = "Grupo";
    public $month = "Enero";
    public $scoresPerGroup;
    public $scoresPerStudent;
    public $activeMembers;
    public $totalParticipants;
    public $groups;
    public $students;
    public $activities;
    public $filter = 0;
    public $groupFilter;
    public $studentFilter;
    public $activityFilter;
    public $months;
    public function render()
    {
        return view('livewire.statistics');
    }
    public function updated()
    {
        $this->totalParticipants = Group::find($this->filter)->members()->get();
        $this->activeMembers = Group::find($this->filter)->members()->get();
    }
    public function mount(){
        $this->months = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
            'Noviembre', 'Diciembre');
        $this->activities = Activity::get();
        $this->groups = Group::where('owner_id', '=', auth()->user()->id)->get()
            ->where('active', '=', 1);
        $tempResult1 = Group::with('members')->where('owner_id', '=', auth()->user()->id)
            ->get()->pluck('members')->all();
        for($j=0; $j < count($tempResult1); $j++){
            $tempResult1[0] = $tempResult1[0]->merge($tempResult1[$j]);
        }
        $this->groupFilter = Group::where('owner_id', '=', auth()->user()->id)->where('active', '=', 1)->first();
        $this->totalParticipants = $this->groupFilter->members()->get();
        $this->activeMembers = $this->groupFilter->members()->get();
        $this->students = $tempResult1[0];
    }
}
