<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Activity2 extends Component
{
    public $name = "Jelly";
    public $exerciseNumber = 0;
    public $idNumber = 0;
    public $exerciseList = array("#1", "#2", "#3", "#4", "#5", "#6", "#7", "#8", "#9", "#10");
    public $exercises = array(array("id" => 1, "Paragraph" => "Hola, Santiago: Te escribo porque quiero invitarte a ver
    una Película en mi casa. Mi mamá dice que puede ser el sábado que viene. Invité a Josué y a Omar, así que no te la
    puedes perder. \n Te espero, \nTu amigo Ismael"), array("id" => 2, "Paragraph" => "Párrafo de prueba 2"),
        array("id" => 3, "Paragraph" => "Párrafo de prueba 3"), array("id" => 4, "Paragraph" => "Párrafo de prueba 4"),
        array("id" => 5, "Paragraph" => "Párrafo de prueba 5"), array("id" => 6, "Paragraph" => "Párrafo de prueba 6"),
        array("id" => 7, "Paragraph" => "Párrafo de prueba 7"), array("id" => 8, "Paragraph" => "Párrafo de prueba 8"),
        array("id" => 9, "Paragraph" => "Párrafo de prueba 9"), array("id" => 10, "Paragraph" => "Párrafo de prueba 10"));
    public $answers = array(array("id" =>1, "options" => array("Cambiar invitarte por inbitarte", "Cambiar Película por película",
        "Cambiar casa por caza")), array("id" =>2, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>3, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>4, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>5, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>6, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>7, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>8, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>9, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")),
        array("id" =>10, "options" => array("opción correcta", "opción incorrecta", "opción incorrecta")));
    public function nextExercise(){
        if($this->exerciseNumber == 9){
            $this->redirect('/');
        }
        else{
            $this->exerciseNumber++;
            $this->idNumber++;
            $this->dispatchBrowserEvent('next', ['number' => $this->exerciseList[$this->idNumber]]);
        }

    }
    public function render()
    {
        return view('livewire.activity2');
    }
}
