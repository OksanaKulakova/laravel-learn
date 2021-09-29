<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use App\Contracts\SalonRepositoryContract;
use App\Contracts\SalonsClientServiceContract;

class SalonRepository extends BaseRepository implements SalonRepositoryContract
{    
    protected $salonsClientService;

    public function __construct(SalonsClientServiceContract $salonsClientService)
    {
        $this->salonsClientService = $salonsClientService;
    }

    public function getSalons(): ?array
    {
        return Cache::tags('salons')->remember(
            'salons_all',
            now()->addHour(),
            function () {
                return $this->salonsClientService->getSalons();
            });
    }

    public function getRandomSalons(): ?array
    {
        return Cache::tags('salons')->remember(
            'salons_random',
            now()->addMinutes(5),
            function () {
                return $this->salonsClientService->getRandomSalons();
            });
    }
}
