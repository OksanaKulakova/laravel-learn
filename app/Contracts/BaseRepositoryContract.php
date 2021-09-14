<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryContract
{
   public function find($id);

   public function findBySlug($slug);

   public function create(array $attributes);

   public function update(array $attributes);

   public function delete();

   public function new();

   public function all();

   public function firstOrCreate($array);
}
