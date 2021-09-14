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
        $oldTags = $model->tags;

        $baseTags = $tags->map(function ($tag) {
            return $this->tagRepository->firstOrCreate(['name' => $tag]);
        });

        $newTags = $baseTags->filter(function ($tag) use ($oldTags) {
            return !$oldTags->contains('id', $tag->id);
        });

        $newTags->map(function ($tag) use ($model) {
            $model->tags()->save($tag);
        });
    }
}
