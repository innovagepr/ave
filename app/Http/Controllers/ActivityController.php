<?php

namespace App\Http\Controllers;

use App\Models\ListExercise;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Helper;


class ActivityController extends Controller
{
    public function show(ListExercise $list){
        $word = $list->words->first()->word;

        //Crea el audio file
        //TODO::Moverlo a cuando se crea el word
//        ApiController::tts($word);


        $user = Auth::user();
        return view('Activity.activity1', compact('word'));
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
//                'header' => "Content-type: application/ssml+xml"."\r\n" .
//                    "X-Microsoft-OutputFormat: riff-8khz-8bit-mono-alaw" . "\r\n" .
//                    "Authorization: " . "Bearer " . $access_token . "\r\n" .
//                    "User-Agent: AVE" . "\r\n" .
//                    "Host: eastus.tts.speech.microsoft.com" . "\r\n",
//                'method' => 'POST',
//                'content' => $SsmlTemplate,
//            ),
//        );
//
//        $context  = stream_context_create($options);
//
//// get the wave data
//        $result = file_get_contents($ttsServiceUri , false, $context);
//
//
//        if (!$result) {
//            throw new Exception("Problem with $ttsServiceUri, $php_errormsg");
//        }
//        else{
//
//            $mp3 = file_put_contents($word.".wav",$result);
//
//
//
////            return view('Activity.activity1', ['sound' => $mp3]);
//
//        }
//    }
}
