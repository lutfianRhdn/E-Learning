<?php

namespace App\Repository;

use App\Models\User;

Class UserRepository extends Repository{
  protected $model;
  public function __construct(User $model)
  {
    $this->model = $model;
  }
  public function create($data): void
  {
    $this->model->create([
      'name' => $data->name,
      'email' => $data->email,
      'password' => 'password',
      'class_id' => $data->class_id,
      'role' => $data->role
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
  function findByRole($role):array {
    return $this->model->where('role',$role)->get()->toArray();
  }
  function update($data,$id):void {
    $this->model->find($id)->update($data);
  }
  function delete($id): void
  {
    $this->model->find($id)->delete();
  }
}