<?php

namespace App\Service;

use App\Http\Requests\StoreClasssRequest;

class UserService extends Service
{
  protected $repository;
  public function __construct($repository)
  {
    $this->repository = $repository;
  }

  function GetAllUser()
  {
    return $this->repository->paginate(10);
   
  }
  function CreateNewUser($data): void
  {
    $this->repository->create($data);
  }
  function GetUserById($id)
  {
    return $this->repository->findUnique($id);
  }
  function DeleteUser($id)
  {
    $this->repository->delete($id);
  }
  function GetAllTeachers():array
  {
    return $this->repository->findByRole('teacher');
  }
  function UpdateUser(array $data,string $id):void{
    $this->repository->update($data,$id);
  }
}
