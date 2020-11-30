<?php

namespace App\Http\Livewire;

use App\Models\LoginRecord;
use Livewire\Component;

class AsideNav extends Component
{
    public $user;
    public $pet;
    public $optionsChild = array (
        "1" => array("Inicio", "dashboard", "home"),
        "2" => array("Actividades", "activities", "book"),
        "3" => array("Mi Mascota", "mascota", "paw"),
        "4" => array("Tienda", "tienda", "store-alt"),
        "5" => array("Mi Progreso", "progreso", "chart-bar"),
    );

    public $optionsAdult = array (
        "1" => array("Inicio", "dashboard", "home"),
        "2" => array("Registro", "grupos", "users"),
        "3" => array("Actividades", "actividades", "book"),
        "4" => array("Estadísticas", "estadisticas", "chart-bar"),
    );



    public function mount(){
        $this->user = auth()->user();
        $this->pet = auth()->user()->pet;
    }

    public function editProfile()
    {
        return redirect()->to('/editarPerfil');
    }

    public function logout(){
        $instance = new LoginRecord;
        $instance->user_id = auth()->user()->id;
        $instance->type = 'logout';
        $instance->date = now();
        $instance->save();

    }
    public function render()
    {
        return view('livewire.aside-nav');
    }
}
