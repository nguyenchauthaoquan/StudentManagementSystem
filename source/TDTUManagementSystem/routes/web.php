<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
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
    Route::get('students', [PersonController::class, 'students']);
    Route::get('students/profile/id={id}', [PersonController::class, 'viewStudent']);
    Route::post('students/add', [PersonController::class, 'addStudent']);
    Route::get('students/create', [PersonController::class, 'createStudent']);
    Route::put('students/update/id={id}', [PersonController::class, 'updateStudent']);
    Route::get('students/edit/id={id}', [PersonController::class, 'editStudent']);

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('admin', function () {
    return view('dashboard');
});
