<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Contracts\CarRepositoryContract;
use App\Contracts\ArticleRepositoryContract;
use App\Contracts\TagRepositoryContract;

class Statistics
{
    public function __construct(CarRepositoryContract $carRepository, ArticleRepositoryContract $articleRepository, TagRepositoryContract $tagRepository)
    {
        $this->carRepository = $carRepository;
        $this->articleRepository = $articleRepository;
        $this->tagRepository = $tagRepository;
    }

    public function get()
    {
        return
        [
            ['Общее количество машин', $this->carRepository->getCountCars()],
            ['Общее количество новостей', $this->articleRepository->getCountArticles()],
            ['Тег, у которого больше всего новостей на сайте', $this->tagRepository->tagHasMostArticles()],
            ['Самая длинная новость', $this->articleRepository->getLongestArticle()],
            ['Самая короткая новость', $this->articleRepository->getShortestArticle()],
            ['Средние количество новостей у тега', $this->tagRepository->getAvgCountArticle()],
            ['Самая тегированная новость', $this->articleRepository->getMostTaggedArticle()],
        ];
    }
}
