<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface SalonRepositoryContract extends BaseRepositoryContract
{
    public function getSalons();

    public function getRandomSalons();
}
