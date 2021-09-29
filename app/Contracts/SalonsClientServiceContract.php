<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface SalonsClientServiceContract
{
    public function getRandomSalons();

    public function getSalons();
}