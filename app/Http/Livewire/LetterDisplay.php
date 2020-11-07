<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use function GuzzleHttp\Psr7\str;

class LetterDisplay extends Component
{
    public $word;
    public $shuffledWord;
    public $splitWord;
    public $answer = [];
    public $position2 = 0;
    public $positions = [];

    protected $messages = [
      'good' => '¡Bien hecho!'
    ];

    public function render(){
        return view('livewire.letter-display');
    }

    public function placeLetter($position, $letter){
        array_push($this->positions,$position);
        array_splice($this->answer, $this->position2, 1, $letter);
        array_splice($this->splitWord, $position, 1, " ");
        $this->position2++;
    }

    public function removeLetter(){

        if($this->position2 >= 1) {
            $this->position2--;
            $temp = array_splice($this->answer, $this->position2, 1, " ");
            array_splice($this->splitWord, array_pop($this->positions), 1, $temp);
        }
    }

    public function shuffleWord(){

        $this->shuffledWord = str_shuffle($this->word);

        if($this->shuffledWord == $this->word){
            $this->shuffleWord();
        }
    }

    public function splitWord(){
        $this->splitWord = str_split($this->shuffledWord);
    }

    public function mount(){
        $this->answer = array_fill(0,strlen($this->word),'');
        $this->shuffleWord();
        $this->splitWord();
        $this->immediateResult();
    }

//Immediate Result ------------------------------------------------------------------------------------------
    public function immediateResult(){
        $joinedWord = implode($this->answer);
        if($joinedWord == $this->word){
//          dd(auth()->user()->answered_words()->get());
//            dd('Son iguales',$joinedWord, $this->word,auth()->user());
            $this->dispatchBrowserEvent('immediateResultGood');
        }else{
//
            $this->dispatchBrowserEvent('immediateResultBad');
        }
    }

//    public function tts($word)
//    {
//
//        $region = "eastus";
//        $AccessTokenUri = "https://" . $region . ".api.cognitive.microsoft.com/sts/v1.0/issueToken";
//        $apiKey = "a38d49ee37904ebe87c9e69f771aa6e6";
//
//        // use key 'http' even if you send the request to https://...
//        $options = array(
//            'http' => array(
//                'header' => "Ocp-Apim-Subscription-Key: " . $apiKey . "\r\n" .
//                    "content-length: 0\r\n",
//                'method' => 'POST',
//            ),
//        );
//
//        $context = stream_context_create($options);
//
////get the Access Token
//        $access_token = file_get_contents($AccessTokenUri, false, $context);
//
//        $ttsServiceUri = "https://" . $region . ".tts.speech.microsoft.com/cognitiveservices/v1";
//
//        $SsmlTemplate = "<speak version='1.0' xml:lang='es-MX'><voice xml:lang='es-MX' xml:gender='Female' name='es-MX-DaliaNeural'> $word </voice></speak>";
//
//        $options = array(
//            'http' => array(
//                'header' => "Content-type: application/ssml+xml" . "\r\n" .
//                    "X-Microsoft-OutputFormat: riff-8khz-8bit-mono-alaw" . "\r\n" .
//                    "Authorization: " . "Bearer " . $access_token . "\r\n" .
//                    "User-Agent: AVE" . "\r\n" .
//                    "Host: eastus.tts.speech.microsoft.com" . "\r\n",
//                'method' => 'POST',
//                'content' => $SsmlTemplate,
//            ),
//        );
//
//        $context = stream_context_create($options);
//
//// get the wave data
//        $result = file_get_contents($ttsServiceUri, false, $context);
//
//
//        if (!$result) {
//            throw new Exception("Problem with $ttsServiceUri, $php_errormsg");
//        } else {
//
//            $mp3 = file_put_contents($word."wav",$result);
//
////          return view('Activity.activity1', ['sound' => $mp3]);
//
//            //return view('Activity.tts', ['sound' => $mp3]);
////            return view('Activity.activity1');
//            return $mp3->download('export.csv');
//
////          return $mp3;
//
//        }
//    }
//
//    public function playAudio($word){
//
//        $this->tts($word);
//    }

}
