<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClasssRequest;
use App\Http\Requests\UpdateClasssRequest;
use App\Models\Classs;
use App\Repository\ClassRepository;
use App\Service\ClassService;

class ClasssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $service;
    function __construct()
    {
        $model = new Classs();
        $repository = new ClassRepository($model);
        $this->service = new ClassService($repository);
    }
    public function index()
    {
        $classes = $this->service->GetAllClassesPaginated();
        return view('admin.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClasssRequest $request)
    {
        $this->service->CreateNewClass($request);
        return redirect()->route('admin.class.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classs $classs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classs= $this->service->GetClassById($id);
        return view('admin.class.edit', compact('classs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasssRequest $request, $id)
    {
        $this->service->UpdateClass($request, $id);
        return redirect()->route('admin.class.index')->with('message', 'Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->service->DeleteClass($id);

        return redirect()->route('admin.class.index')->with('message', 'Class deleted successfully');
    }
}
