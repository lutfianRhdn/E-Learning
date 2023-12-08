<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddClassRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Classs;
use App\Models\Course;
use App\Models\User;
use App\Repository\ClassRepository;
use App\Repository\CourseRepository;
use App\Repository\UserRepository;
use App\Service\ClassService;
use App\Service\CourseService;
use App\Service\UserService;
use Illuminate\Contracts\View\View;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $repository;
    private $service;
    private $classService;
    private $userService;
    
    function __construct()
    {
        $this->repository = new CourseRepository(new Course());
        $this->service = new CourseService($this->repository);
        $this->classService = new ClassService(new ClassRepository(new Classs()));
        $this->userService = new UserService(new UserRepository(new User()));
    }
    public function index()
    {
        $headers = [['label' => 'Name', 'key' => 'name'], ['label' => 'Created At', 'key' => 'created_at']];
        $courses  = $this->service->GetAllCoursePaginated();
        return view('admin.course.index',compact('courses','headers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = $this->classService->GetAllClasses();
        $teachers = $this->userService->GetAllTeachers();
        return view('admin.course.create',compact('classes','teachers'));
    }
    function addClass($id) : View {
        $course = $this->service->GetCourseById($id);
        $classes = $this->classService->GetAllClasses();
        
        return view('admin.course.add-class',compact('course', 'classes'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $this->service->CreateNewCourse($request->all());
        return redirect()->route('admin.course.index')->with('success','Course created successfully');
    }
    function storeClass(StoreAddClassRequest $request, $id) {
        $this->service->AddClassToCourse( $id, $request->class_id);
        return redirect()->route('admin.course.index')->with('success','Class added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $classes = $this->classService->GetAllClasses();
        $teachers = $this->userService->GetAllTeachers();
        return view('admin.course.edit', compact('classes','teachers','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->service->UpdateCourse($request->all(),$course->id);
        return redirect(route('admin.course.index'))->with('message','success Upated Course');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->service->DeleteCourse($course->id);
        return redirect(route('admin.course.index'))->with('message','success Deleted Course');
    }
}
