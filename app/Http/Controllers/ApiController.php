<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{

    /**
     * Function to execute Text-to-Speech Service from Microsoft Azure
     * Allows to convert text into audio.
     * @param $word
     */
    public static function tts($word)
    {

        $region = "eastus";
        $AccessTokenUri = "https://" . $region . ".api.cognitive.microsoft.com/sts/v1.0/issueToken";
        $apiKey = "a38d49ee37904ebe87c9e69f771aa6e6";

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header' => "Ocp-Apim-Subscription-Key: " . $apiKey . "\r\n" .
                    "content-length: 0\r\n",
                'method' => 'POST',
            ),
        );

        $context = stream_context_create($options);

//get the Access Token
        $access_token = file_get_contents($AccessTokenUri, false, $context);

        $ttsServiceUri = "https://" . $region . ".tts.speech.microsoft.com/cognitiveservices/v1";

        $SsmlTemplate = "<speak version='1.0' xml:lang='es-MX'><voice xml:lang='es-MX' xml:gender='Female' name='es-MX-HildaRUS'><prosody rate='-20.00%'>$word</prosody></voice></speak>";

        $options = array(
            'http' => array(
                'header' => "Content-type: application/ssml+xml"."\r\n" .
                    "X-Microsoft-OutputFormat: ogg-24khz-16bit-mono-opus" . "\r\n" .
                    "Authorization: " . "Bearer " . $access_token . "\r\n" .
                    "User-Agent: AVE" . "\r\n" .
                    "Host: eastus.tts.speech.microsoft.com" . "\r\n",
                'method' => 'POST',
                'content' => $SsmlTemplate,
            ),
        );

        $context  = stream_context_create($options);

// get the wave data
        $result = file_get_contents($ttsServiceUri , false, $context);


        if (!$result) {
            throw new Exception("Problem with $ttsServiceUri, $php_errormsg");
        }
        else{

            $mp3 = file_put_contents($word.".wav",$result);

        }
    }
}
