<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET', 'posts');

        return json_decode(dd($response->getBody()->getContents()));
    }

    public function tts()
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

        $SsmlTemplate = "<speak version='1.0' xml:lang='es-MX'><voice xml:lang='es-MX' xml:gender='Female' name='es-MX-DaliaNeural'> Hola, ratoncito de maya peludo. </voice></speak>";

        $options = array(
            'http' => array(
                'header' => "Content-type: application/ssml+xml"."\r\n" .
                    "X-Microsoft-OutputFormat: riff-8khz-8bit-mono-alaw" . "\r\n" .
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

            $mp3 = file_put_contents("test.wav",$result);

//            echo "<br/>Download   Audio: <a href='test.wav'>here</a>";


            return view('Activity.tts', ['sound' => $mp3]);

        }
    }
}
