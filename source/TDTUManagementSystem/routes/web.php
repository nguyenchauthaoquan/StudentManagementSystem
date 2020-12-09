<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [PersonController::class, 'home']);

    Route::prefix('users')->group(function () {
        Route::get('/', [PersonController::class, 'users']);
        Route::get('create', [PersonController::class, 'createUser']);
        Route::get('update/id={id}', [PersonController::class, 'editUser']);
    });
    Route::prefix('roles')->group(function () {
        Route::get('create', [PersonController::class, 'createRole']);
        Route::post('add', [PersonController::class, 'addRole']);
    });

    Route::prefix('teachers')->group(function () {
        Route::get('/', [PersonController::class, 'teachers']);
        Route::get('profile/id={id}', [PersonController::class, 'viewTeacher']);
        Route::get('create', [PersonController::class, 'createTeacher']);
        Route::get('edit/id={id}', [PersonController::class, 'editTeacher']);
        Route::post('add', [PersonController::class, 'addTeacher']);
        Route::put('update/id={id}', [PersonController::class, 'updateTeacher']);
        Route::get('delete/id={id}', [PersonController::class, 'deleteTeacher']);

        Route::prefix('backgrounds')->group(function () {
            Route::get('create/id={id}', [PersonController::class, 'createTeacherBackground']);
            Route::get('edit/id={id}', [PersonController::class, 'editTeacherBackground']);
            Route::post('add/id={id}', [PersonController::class, 'addTeacherBackground']);
            Route::put('update/id={id}', [PersonController::class, 'updateTeacherBackground']);
        });

        Route::prefix('policies')->group(function () {
            Route::get('create/id={id}', [PersonController::class, 'createTeacherPolicy']);
            Route::get('edit/id={id}', [PersonController::class, 'editTeacherPolicy']);
            Route::post('add/id={id}', [PersonController::class, 'addTeacherPolicy']);
            Route::put('update/id={id}', [PersonController::class, 'updateTeacherPolicy']);
        });
    });

    Route::prefix('students')->group(function () {
        Route::get('/', [PersonController::class, 'students']);
        Route::get('create', [PersonController::class, 'createStudent']);
        Route::get('profile/id={id}', [PersonController::class, 'viewStudent']);
        Route::get('edit/id={id}', [PersonController::class, 'editStudent']);;
        Route::post('add', [PersonController::class, 'addStudent']);
        Route::put('update/id={id}', [PersonController::class, 'updateStudent']);
        Route::get('delete/id={id}', [PersonController::class, 'deleteStudent']);

        Route::prefix('backgrounds')->group(function () {
            Route::get('create/id={id}', [PersonController::class, 'createStudentBackground']);
            Route::get('edit/id={id}', [PersonController::class, 'editStudentBackground']);
            Route::post('add/id={id}', [PersonController::class, 'addStudentBackGround']);
            Route::put('update/id={id}', [PersonController::class, 'updateStudentBackground']);
        });

        Route::prefix('policies')->group(function () {
            Route::get('create/id={id}', [PersonController::class, 'createStudentPolicy']);
            Route::get('edit/id={id}', [PersonController::class, 'editStudentPolicy']);
            Route::post('add/id={id}', [PersonController::class, 'addStudentPolicy']);
            Route::put('update/id={id}', [PersonController::class, 'updateStudentPolicy']);
        });
    });
    Route::prefix('programs')->group(function () {
        Route::get('/', [EducationController::class, 'training_programs']);
        Route::get('create', [EducationController::class, 'createTrainingProgram']);
        Route::get('edit/id={id}', [EducationController::class, 'editTrainingProgram']);
        Route::post('add', [EducationController::class, 'addTrainingProgram']);
        Route::put('update/id={id}', [EducationController::class, 'updateTrainingProgram']);
        Route::get('delete/id={id}', [EducationController::class, 'deleteTrainingProgram']);
    });
    Route::prefix('faculties')->group(function () {
        Route::get('/', [EducationController::class, 'faculties']);
        Route::get('create', [EducationController::class, 'createFaculty']);
        Route::get('view/id={id}', [EducationController::class, 'viewFaculty']);
        Route::get('edit/id={id}', [EducationController::class, 'editFaculty']);
        Route::post('add', [EducationController::class, 'addFaculty']);
        Route::put('update/id={id}', [EducationController::class, 'updateFaculty']);
        Route::prefix('majors')->group(function () {
            Route::get('create/id={id}', [EducationController::class, 'createMajor']);
            Route::get('edit/id={id}', [EducationController::class, 'editMajor']);
            Route::post('add/id={id}', [EducationController::class, 'addMajor']);
            Route::put('update/id={id}', [EducationController::class, 'updateMajor']);
        });

    });
    Route::prefix('groups')->group(function () {
        Route::get('/', [EducationController::class, 'groups']);
        Route::get('view/id={id}', [EducationController::class, 'viewGroup']);
        Route::get('create', [EducationController::class, 'createGroup']);
        Route::get('edit/id={id}', [EducationController::class, 'editGroup']);
        Route::post('add', [EducationController::class, 'addGroup']);
        Route::put('update/id={id}', [EducationController::class, 'updateGroup']);
    });

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
