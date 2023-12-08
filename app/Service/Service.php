<?php

namespace App\Service;

abstract class Service
{
  protected $repository;
  abstract public function __construct($repository);
  
}