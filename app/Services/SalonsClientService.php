<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Contracts\SalonsClientServiceContract;

class SalonsClientService implements SalonsClientServiceContract
{
    private $user;

    private $password;

    private $link;

    public function __construct()
    {
        $this->user = env('SALONS_USER');
        $this->password = env('SALONS_PASSWORD');

        $this->link = 'https://studentsapi.academy.qsoft.ru/api/v1/salons';
        // $this->client = new \GuzzleHttp\Client([
        //     'verify' => false,
        //     'http_errors' => false,
        //     'auth' => [env('SALONS_USER'), env('SALONS_PASSWORD')],
        // ]);
    }

    public function getRandomSalons(int $limit = 2): ?array
    {
        $response = Http::withBasicAuth($this->user, $this->password)
            ->get($this->link, ['limit' => $limit,'in_random_order' => '']);

        $response->successful() ?? $response->throw()->json();

        return json_decode($response);
    }

    public function getSalons(): ?array
    {
        $response = Http::withBasicAuth($this->user, $this->password)->get($this->link);

        $response->successful() ?? $response->throw()->json();

        return json_decode($response);
    }
}
