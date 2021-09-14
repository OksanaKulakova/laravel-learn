<?php   

namespace App\Repositories;   

use Illuminate\Database\Eloquent\Model;
use App\Contracts\BaseRepositoryContract;

class BaseRepository implements BaseRepositoryContract 
{        
    protected $model;       
   
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes)
    {
        $this->model->update($attributes);
    }

    public function delete()
    {
        $this->model->delete();  
    }

    public function new()
    {
        return $this->model;
    }

    public function all()
    {
        return $this->model->all();    
    }

    public function firstOrCreate($array)
    {
        return $this->model->firstOrCreate($array);
    }
}
