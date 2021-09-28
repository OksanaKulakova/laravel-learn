<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SalonsClientService
{
    private $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'verify' => false,
            'http_errors' => false,
            'auth' => [env('SALONS_USER'), env('SALONS_PASSWORD')],
        ]);
    }

    public function getRandomSalons()
    {
        try {
            $response = $this->client->get('http://studentsapi.academy.qsoft.ru/api/v1/salons?limit=2&in_random_order')->getBody()->getContents();
            return json_decode($response);
            
        } catch (ClientException $e) {

        }  
    }

    public function getSalons()
    {
        $response = $this->client->get('http://studentsapi.academy.qsoft.ru/api/v1/salons')->getBody()->getContents();
        return json_decode($response);
    }
}
