<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\CompletedActivity;
use App\Models\Group;
use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\User;

class Statistics extends Component
{
    public $option = "Grupo";
    public $readingMax;
    public $readingMin;
    public $readingAvg;
    public $wordMax;
    public $wordMin;
    public $wordAvg;
    public $scoresPerStudent;
    public $activeMembers;
    public $totalParticipants;
    public $groups;
    public $readingId;
    public $wordId;
    public $students;
    public $activities;
    public $filter = 0;
    public $groupFilter;
    public $tempGroupFilter;
    public $studentFilter;
    public $activityFilter;
    public $months;

    protected $listeners = [
        'updateGroup'
    ];
    public function render()
    {
        return view('livewire.statistics');
    }
    public function updated()
    {
        $this->totalParticipants = Group::find($this->groupFilter)->members()->get();
        $this->activeMembers = Group::find($this->groupFilter)->members()->get();
        if($this->option === 'Grupo'){
            $this->tempGroupFilter = $this->groupFilter;
            $this->groupFilter = null;
            $this->emit('updateGroup');

        }
        if($this->option === 'Estudiante'){
         $student = User::find($this->studentFilter);
         $studentScoresReading = CompletedActivity::where('user_id', '=', $this->studentFilter)->where('activity_id', '=', $this->readingId);
         $this->readingMax = $studentScoresReading->max('final_score');
         $this->readingMin = $studentScoresReading->min('final_score');
         $this->readingAvg = $studentScoresReading->avg('final_score');
         $studentScoresWord = CompletedActivity::where('user_id', '=', $this->studentFilter)->where('activity_id', '=', $this->wordId);
         $this->wordMax = $studentScoresWord->max('final_score');
         $this->wordMin = $studentScoresWord->min('final_score');
         $this->wordAvg = $studentScoresWord->avg('final_score');
        }
        if($this->option === 'Actividad'){
            $this->readingMax = null;
            $this->readingMin = null;
            $this->readingAvg = null;
        }


    }
    public function updateGroup(){
        $this->groupFilter = $this->tempGroupFilter;
    }
    public function mount()
    {
        $this->activities = Activity::get();
        $this->readingId = Activity::where('slug', '=', 'reading')->first()->id;
        $this->wordId = Activity::where('slug', '=', 'letterOrdering')->first()->id;
        $this->groups = Group::where('owner_id', '=', auth()->user()->id)->where('deleted', '=', 0)->where('active', '=', 1)->get();
        $tempResult1 = Group::with('members')->where('owner_id', '=', auth()->user()->id)
            ->get()->pluck('members')->all();
        if($tempResult1){
            for ($j = 0; $j < count($tempResult1); $j++) {
                $tempResult1[0] = $tempResult1[0]->merge($tempResult1[$j]);
            }
            $this->students = $tempResult1[0];
         }
        if($this->groups->first()){
            $this->groupFilter = $this->groups->first()->id;
        }
        if($this->students){
            $this->studentFilter = $this->students[0]->id;
        }
        $this->activityFilter = $this->activities->first()->name;
        if($this->groupFilter){
            $this->totalParticipants = Group::find($this->groupFilter)->members()->get();
            $this->activeMembers = Group::find($this->groupFilter)->members()->where('active', '=', 1)->get();
        }

    }

}
