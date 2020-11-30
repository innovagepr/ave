<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\CompletedActivity;
use App\Models\Difficulty;
use Livewire\Component;
use Carbon\Carbon;

class ChildProgress extends Component
{
    public $allActivities;
    public $recentActivities;
    public $totalExercises;
    public $totalWordExercises;
    public $totalReadingExercises;
    public $averageWordScore;
    public $averageReadingScore;

    public function render()
    {
        return view('livewire.child-progress');
    }

    public function mount(){
        $this->allActivities = CompletedActivity::where('user_id', '=', auth()->user()->id)->get();
            $this->recentActivities = CompletedActivity::where('user_id', '=', auth()->user()->id)->latest()->take(5)->get();
            $this->totalExercises = count($this->recentActivities);
            $this->totalWordExercises = count($this->recentActivities->where('activity_id', '=', 1));
        $this->totalReadingExercises = count($this->recentActivities->where('activity_id', '=', 2));
        $this->averageWordScore = $this->allActivities->where('activity_id', '=', 1)->avg('final_score');
        $this->averageReadingScore = $this->allActivities->where('activity_id', '=', 2)->avg('final_score');
        $this->genChart();
    }

    public function getDifficulty($difficulty_id){
        return Difficulty::find($difficulty_id)->name;
    }
    public function getActivityName($activity_id){
        return Activity::find($activity_id)->name;
    }
    public function genChart(){
        $stocksTable = \Lava::DataTable();
        $stocksTable->addStringColumn('Tipo de Actividad')
            ->addNumberColumn('Promedio')
            ->addRow(array($this->getActivityName(1), $this->averageWordScore))
            ->addRow(array($this->getActivityName(2), $this->averageReadingScore));
        \Lava::BarChart('MyStocks', $stocksTable);
    }
}
