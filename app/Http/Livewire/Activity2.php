<?php

namespace App\Http\Livewire;

use Livewire\Component;

/**
 * Livewire Component for the Reading Comprehension Activity
 * Class Activity2
 * @package App\Http\Livewire
 */
class Activity2 extends Component
{
    protected $rules = [
        'option' => 'required',
    ];
    protected $messages = [
        'option.required' => 'Favor escoger una opción.',
    ];
    public $name = "Jelly";
    public $step = 0;
    public $exerciseKey;
    public $exerciseNumber = 0;
    public $key;
    public $idNumber = 0;
    public $score = 0;
    public $option;
    public $studentAnswers = array();
    public $exerciseList = array("#1", "#2", "#3", "#4", "#5", "#6", "#7", "#8", "#9", "#10");
    public $exercises = array(array("id" => 1, "Paragraph" => "Hola, Santiago: Te escribo porque quiero invitarte a ver
    una Película en mi casa. Mi mamá dice que puede ser el sábado que viene. Invité a Josué y a Omar, así que no te la
    puedes perder. \n Te espero, \nTu amigo Ismael"), array("id" => 2, "Paragraph" => "Párrafo de prueba 2"),
        array("id" => 3, "Paragraph" => "Párrafo de prueba 3"), array("id" => 4, "Paragraph" => "Párrafo de prueba 4"),
        array("id" => 5, "Paragraph" => "Párrafo de prueba 5"), array("id" => 6, "Paragraph" => "Párrafo de prueba 6"),
        array("id" => 7, "Paragraph" => "Párrafo de prueba 7"), array("id" => 8, "Paragraph" => "Párrafo de prueba 8"),
        array("id" => 9, "Paragraph" => "Párrafo de prueba 9"), array("id" => 10, "Paragraph" => "Párrafo de prueba 10"));
    public $answers = array(array("id" =>1, "options" => array("Cambiar invitarte por inbitarte", "Cambiar Película por película",
        "Cambiar casa por caza")), array("id" =>2, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>3, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>4, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>5, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>6, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>7, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>8, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>9, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")),
        array("id" =>10, "options" => array("opción correcta", "opción incorrecta 1", "opción incorrecta 2")));
    public $correctAnswers = array(array( "id" => 1, "key" => "Cambiar Película por película"),
                                    array("id" => 2, "key" => "opción correcta"),
                                    array("id" => 3, "key" => "opción correcta"),
        array("id" => 4, "key" => "opción correcta"),
        array("id" => 5, "key" => "opción correcta"),
        array("id" => 6, "key" => "opción correcta"),
        array("id" => 7, "key" => "opción correcta"),
        array("id" => 8, "key" => "opción correcta"),
        array("id" => 9, "key" => "opción correcta"),
        array("id" => 10, "key" => "opción correcta"));

    /**
     * Sets the currently selected answer based on the radio button that is pressed.
     * @param $option the answer that has been chosen
     */
    public function setAnswer($option){
        $this->option= $option;
    }

    /**
     *Proceeds to the next exercise, and instructs the front-end to show a modal detailing if the exercise was correct or not.
     */
    public function nextExercise(){
        $this->key = $this->correctAnswers[$this->exerciseNumber]['key'];
        if($this->step == 9){
            $this->dispatchBrowserEvent('results' );
        }
        else{
            $this->validate();
            if($this->option === $this->correctAnswers[$this->exerciseNumber]['key']){
                $this->score++;
                $this->dispatchBrowserEvent('correctAnswer' );
            }
            else{
                $this->dispatchBrowserEvent('incorrectAnswer' );
            }
            $this->step++;
            $this->exerciseNumber++;
            $this->idNumber++;

        }

    }

    /**
     * renders the view.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * the file associated with the front-end view for this function.
     */
    public function render()
    {
        return view('livewire.activity2');
    }
}
