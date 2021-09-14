<?php
namespace App\Contracts;

use App\Model\Article;
use Illuminate\Support\Collection;

interface ArticleRepositoryContract extends BaseRepositoryContract
{
   public function getPublishedArticles();
}
