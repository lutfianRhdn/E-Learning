<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminCourseIndex extends Component
{
    public $course;
    public $isModalOpen = false;
    public function __construct($course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('admin.course.index');
    }
    public function toggleModal()
    {
        $this->isModalOpen = !$this->isModalOpen;
    }
}