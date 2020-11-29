<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TopNav extends Component
{

    public $user;
    public $optionsChild = array (
        "1" => array("Inicio", "dashboard", "home"),
        "2" => array("Actividades", "activities", "book"),
        "3" => array("Mi Mascota", "mascota", "paw"),
        "4" => array("Tienda", "tienda", "store-alt"),
        "5" => array("Mi Progreso", "dashboard", "chart-bar"),
    );

    public $optionsAdult = array (
        "1" => array("Inicio", "dashboard", "home"),
        "2" => array("Registro", "grupos", "users"),
        "3" => array("Actividades", "actividades", "book"),
        "4" => array("Estadísticas", "estadisticas", "chart-bar"),
    );

    public function mount(){
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.top-nav');
    }
}
