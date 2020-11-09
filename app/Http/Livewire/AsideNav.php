<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AsideNav extends Component
{
    public $optionsChild = array (
        "1" => array("Inicio", "dashboard", "home"),
        "2" => array("Actividades", "dashboard", "book"),
        "3" => array("Mi Mascota", "dashboard", "paw"),
        "4" => array("Tienda", "dashboard", "store-alt"),
        "5" => array("Mi Progreso", "dashboard", "chart-bar"),
    );

    public $optionsAdult = array (
        "1" => array("Inicio", "dashboard", "home"),
        "2" => array("Registro", "dashboard", "users"),
        "3" => array("Actividades", "dashboard", "book"),
        "4" => array("Estadísticas", "dashboard", "chart-bar"),
    );

    public function render()
    {
        return view('livewire.aside-nav');
    }
}
