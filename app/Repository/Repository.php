<?php 

namespace App\Repository;

abstract class Repository
{
  protected $model;
  abstract public function create($data): void;
  abstract public function find(): array;
  abstract public function findUnique($id): array;
  abstract public function update($data,$id): void;
  abstract public function delete($id): void;

}