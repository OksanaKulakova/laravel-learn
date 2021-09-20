<?php

namespace App\Repositories;

use App\Models\Image;
use App\Contracts\ImageRepositoryContract;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class ImageRepository extends BaseRepository implements ImageRepositoryContract
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }

    public function create($path): Model
    {
        return $this->model->create(['image' => $path]);
    }
}
