<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use App\Models\User;
use App\Repository\ClassRepository;
use App\Repository\UserRepository;
use App\Service\ClassService;
use App\Service\UserService;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $repository;
    private $classService;
    private $service;
    function __construct()
    {
        $this->repository = new UserRepository(new User());
        $this->classService = new ClassService(new ClassRepository(new Classs()));
        $this->service = new UserService($this->repository);
    }
     public function index()
    {
        $headers = [['label' => 'Name', 'key' => 'name'], ['label' => 'Email', 'key' => 'email'], ['label' => 'Created At', 'key' => 'created_at']];
        $users  = $this->service->GetAllUser();
        return view('admin.user.index',compact('users','headers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = $this->classService->GetAllClasses();
        return view('admin.user.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->service->CreateNewUser($request);
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->service->GetUserById($id);
        $classes = $this->classService->GetAllClasses();
        return view('admin.user.edit', compact('classes','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->service->UpdateUser($request->all(),$id);
        return redirect(route('admin.user.index'))->with('message','success Upated User');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->DeleteUser($id);
        return redirect(route('admin.user.index'))->with('message','success Deleted User');
    }
}
