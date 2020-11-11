<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('students')->group(function () {
    Route::get('/', [PersonController::class, 'students']);
    Route::get('id={id}', [PersonController::class, 'viewStudent']);
    Route::post('create', [PersonController::class, 'addStudent']);
    Route::put('id={id}', [PersonController::class, 'updateStudent']);
    Route::prefix('backgrounds')->group(function () {
        Route::post('id={id}', [PersonController::class, 'addBackground']);
        Route::put('id={id}', [PersonController::class, 'updateBackground']);
    });
});

Route::prefix('teachers')->group(function () {
    Route::get('/', [PersonController::class, 'teachers']);
    Route::get('id={id}', [PersonController::class, 'viewTeacher']);
    Route::post('create', [PersonController::class, 'addTeacher']);
    Route::put('id={id}', [PersonController::class, 'updateTeacher']);
    Route::prefix('backgrounds')->group(function () {
        Route::post('id={id}', [PersonController::class, 'addBackground']);
        Route::put('id={id}', [PersonController::class, 'updateBackground']);
    });
});
