<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Statistics extends Component
{
    public $option = "Grupo";
    public $month = "Enero";
    public $scoresPerGroup = array(array("id" => 0, "difficulty" => "Fácil", "score" => "78%"),
                                   array("id" => 0, "difficulty" => "Medio", "score" => "65%"),
                                   array("id" => 0, "difficulty" => "Difícil", "score" => "59%"),
                                   array("id" => 1, "difficulty" => "Fácil", "score" => "80%"),
                                   array("id" => 1, "difficulty" => "Medio", "score" => "67%"),
                                   array("id" => 1, "difficulty" => "Difícil", "score" => "63%"));
    public $scoresPerStudent = array(array("id" => 0, "difficulty" => "Fácil", "score" => "90%"),
        array("id" => 0, "difficulty" => "Medio", "score" => "88%"),
        array("id" => 0, "difficulty" => "Difícil", "score" => "80%"),
        array("id" => 1, "difficulty" => "Fácil", "score" => "96%"),
        array("id" => 1, "difficulty" => "Medio", "score" => "89%"),
        array("id" => 1, "difficulty" => "Difícil", "score" => "75%"));
    public $activeMembers = array(array("id" => 0, "numberActive" => 4), array("id" => 1, "numberActive" => 9));
    public $totalParticipants = array(array("id" => 0, "total" => 3), array("id" => 1, "total" => 5));
    public $groups = array(array("id"=> 0,"name" => "Grupo 1"),
        array("id" => 1,"name" => "Grupo 2"));
    public $students = array(array("id" => 0, "name" => "Miguel Rivera", "active" => 1),
        array("id" => 1, "name" => "Laura Perez", "active" => 0));
    public $activities = array(array("id" => 0, "name" => "Palabras"), array("id" => 1, "name" => "Lectura"));
    public $filter = 0;
    public function render()
    {
        return view('livewire.statistics');
    }
}
