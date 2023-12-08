<?php

namespace App\Service;

use App\Models\Classs;
use App\Models\User;

class CourseService extends Service{
  protected $repository;
  public function __construct($repository)
  {
    $this->repository = $repository;
  }
  function GetAllCourse()
  {
    return $this->repository->find();
  }

  function GetAllCoursePaginated()
  {
    return $this->repository->paginate(10);
  }
  function CreateNewCourse($data): void
  {
    $createdCourse = $this->repository->create($data);
  }
  function GetCourseById($id)
  {
    return $this->repository->findUnique($id);
  }
  function DeleteCourse($id)
  {
    $this->repository->delete($id);
  }
  function UpdateCourse(array $data,string $id):void{
    $this->repository->update($data,$id);
  }
  function AddClassToCourse($courseId, $classId)
  {
    $this->repository->addRelation($courseId, 'classes', $classId);
  }
  function getAllMycourse()
  {
    if(auth()->user()->role == 'teacher')return $this->repository->findByRelation(User::class, auth()->user()->id, ['teacher']);
    else if (auth()->user()->role=='student') return $this->repository->findByRelation(Classs::class,auth()->user()->class_id,['teacher']);
  }
  function addResource($data,$id){
    $file = $data->file->store('public/resources');
    $data['file'] = $file;
    $this->repository->addToRelation($id,'resources',[
      'name' => $data['title'],
      'file' => $file,
  ]);
  }
}