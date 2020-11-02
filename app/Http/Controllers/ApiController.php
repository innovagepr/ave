<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos/1');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return $body;
    }
}
