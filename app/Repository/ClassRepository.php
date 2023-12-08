<?php

namespace App\Repository;

use App\Models\Classs;
use Illuminate\Support\Str;
class ClassRepository extends Repository
{
  protected $model;
  public function __construct(Classs $model)
  {
    $this->model = $model;
  }

  public function create($data): void
  {
    $this->model->create([
      'name' => $data->name,
      'code'=>Str::random(5)
    ]);
  }

  public function find(): array
  {
    return $this->model->all()->toArray();
  }
  public function paginate($number)
  {
    return $this->model->paginate($number);
  }

  public function findUnique($id): array
  {
    return $this->model->find($id)->toArray();
  }

  public function update($data,$id): void
  {
    $this->model->find($id)->update([
      'name' => $data->name,
    ]);
  }
  function delete($id): void
  {
    $this->model->find($id)->delete();
  }
}
