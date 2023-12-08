<?php 

namespace App\Repository;

use App\Models\Course;
use Illuminate\Support\Str;

class CourseRepository extends  Repository
{
  protected $model;
  public function __construct($model)
  {
    $this->model = $model;
  }
  function create($data) :void {
    $createdCourse = $this->model->create([
      'name' => $data['name'],
      'code'=> Str::random(5),
      'teacher_id' => $data['teacher_id'],
    ]);
    
  }
  function update($data,$id) :void {
    $this->model->find($id)->update($data);
  }
  function delete($id) :void {
    $this->model->find($id)->delete();
  }
  function findUnique($id) :array {
    return $this->model->with('classes')->find($id)->toArray();
  }
  function paginate($number)  {
    return $this->model->paginate($number);
  }
  function find():array {
    return $this->model->all()->toArray();
  }
  function findByRelation($model, $value,$with) :array {
    if($model::find($value) == null) return array();
    return $model::find($value)->courses()->with($with)->get()->toArray();
  }
  function addRelation($id, $relation, $relationId) :void {
    $this->model->find($id)->$relation()->attach($relationId);
  }
  function addToRelation(string$id, string$relation,array $data) :void {
    $this->model->find($id)->$relation()->create($data);
  }
}