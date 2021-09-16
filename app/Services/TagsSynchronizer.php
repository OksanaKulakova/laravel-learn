<?php

namespace App\Services;

use App\Contracts\Interfaces\HasTags;
use Illuminate\Support\Collection;
use App\Contracts\TagRepositoryContract;

class TagsSynchronizer
{
    private $tagRepository;
  
    public function __construct(TagRepositoryContract $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function sync(Collection $tags, HasTags $model)
    {
        $baseTags = $tags->map(function ($tag) {
            return $this->tagRepository->firstOrCreate(['name' => $tag]);
        });

        $model->tags()->detach();

        $newTags = $baseTags->filter(function ($tag) use ($baseTags) {
            return $baseTags->contains('id', $tag->id);
        });

        $newTags->map(function ($tag) use ($model) {
            $model->tags()->save($tag);
        });
    }
}
