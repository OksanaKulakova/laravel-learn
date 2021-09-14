<?php

namespace App\Services;

use App\Contracts\Interfaces\HasTags;
use Illuminate\Support\Collection;
use App\Models\Tag;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        $oldTags = $model->tags;

        $baseTags = $tags->map(function ($tag) {
            return Tag::firstOrCreate(['name' => $tag]);
        });

        $newTags = $baseTags->filter(function ($tag) use ($oldTags) {
            return !$oldTags->contains('id', $tag->id);
        });

        $newTags->map(function ($tag) use ($model) {
            $model->tags()->save($tag);
        });
    }
}
