<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryContract extends BaseRepositoryContract
{
   public function findBySlug($slug): ?Model;

   public function create(array $attributes): Model;

   public function update(array $attributes): void;

   public function delete(): void;

   public function new(): Model;

   public function getPublishedArticles(int $page, int $perPage): LengthAwarePaginator;

   public function getLatestPublishedArticles(int $count): Collection;

}
