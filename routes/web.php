<?php

use App\Http\Controllers\ClasssController;
use App\Http\Controllers\AdminCourseController as AdminCourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| IDENTITAS DIRI
|--------------------------------------------------------------------------
|
| Nama : Lutfian Rahdiansyah
| NIM : 10121127
| Kelas : IF-4
| Matkul : Penerapan Teknologi Internet
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/course',CourseController::class);
    Route::post('/course/{id}/add-resource', [CourseController::class, 'addResource'])->name('course.add-resource');

    Route::group(['prefix'=>'admin','as'=>'admin.'],function () {
        Route::resource('/class', ClasssController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/course', AdminCourseController::class);
        Route::get('/course/{course}/add-class', [AdminCourseController::class, 'addClass'])->name('course.add-class');
        Route::post('/course/{course}/add-class', [AdminCourseController::class, 'storeClass'])->name('course.store-class');
    });
});

require __DIR__.'/auth.php';
