<?php   

namespace App\Repositories;   

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Contracts\BaseRepositoryContract;

class BaseRepository implements BaseRepositoryContract 
{        
    protected $model;       
   
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

}
