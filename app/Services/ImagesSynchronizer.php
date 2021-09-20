<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Contracts\ImageRepositoryContract;
use App\Models\Image;

class ImagesSynchronizer
{
    private $imageRepository;
  
    public function __construct(ImageRepositoryContract $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function sync($file, $model)
    {
        if ($file) {
            $path = $file->store('', 'public');
            $image = $this->imageRepository->create($path);
            $model->image()->associate($image->id)->save();
        }
    }
}
