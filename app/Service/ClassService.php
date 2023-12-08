<?php

namespace App\Service;

use App\Http\Requests\StoreClasssRequest;

class ClassService extends Service
{
    protected $repository; 
    public function __construct( $repository)
    {
        $this->repository = $repository;
    }

    function CreateNewClass(StoreClasssRequest $data) : void
    {
      $this->repository->create($data);
    }
    function GetAllClasses() 
    {
      $classes= $this->repository->find();
      return $classes;
    }

    function GetAllClassesPaginated()
    {
      $classes = $this->repository->paginate(10);
      return $classes;
    }
    function GetClassById($id)
    {
      $class = $this->repository->findUnique($id);
      return $class;
    }
    function UpdateClass($data,$id)
    {
      $this->repository->update($data,$id);
    }
    function DeleteClass($id)
    {
      $this->repository->delete($id);
    }
}
