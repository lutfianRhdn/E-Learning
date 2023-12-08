<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddResourceRequest;
use App\Models\Course;
use App\Repository\CourseRepository;
use App\Service\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $repository;
    private $service;
    function __construct()
    {
        $this->repository = new CourseRepository(new Course());
        $this->service = new CourseService($this->repository);
    }
    public function index()
    {
        $courses = $this->service->getAllMycourse();
        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
    function addResource(AddResourceRequest $request,$id) {
        $this->service->addResource($request,$id);
        return redirect()->back();
    }
}
