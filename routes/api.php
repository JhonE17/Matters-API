<?php

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

/* API Routes CRUD students */

Route::get('/student', [\App\Http\Controllers\StudentController::class, 'index']);

Route::get('/student/{id}', [\App\Http\Controllers\StudentController::class, 'show']);

Route::post('/student', [\App\Http\Controllers\StudentController::class, 'store']);

Route::put('/student/{id}', [\App\Http\Controllers\StudentController::class, 'update']);

Route::delete('/student/{id}', [\App\Http\Controllers\StudentController::class, 'destroy']);

/* API Routes CRUD students */

Route::get('/teacher', [\App\Http\Controllers\TeacherController::class, 'index']);

Route::get('/teacher/{id}', [\App\Http\Controllers\TeacherController::class, 'show']);

Route::post('/teacher', [\App\Http\Controllers\TeacherController::class, 'store']);

Route::put('/teacher/{id}', [\App\Http\Controllers\TeacherController::class, 'update']);

Route::delete('/teacher/{id}', [\App\Http\Controllers\TeacherController::class, 'destroy']);

/* API Routes CRUD students */

Route::get('/subject', [\App\Http\Controllers\SubjectController::class, 'index']);

Route::get('/subject/{id}', [\App\Http\Controllers\SubjectController::class, 'show']);

Route::post('/subject', [\App\Http\Controllers\SubjectController::class, 'store']);

Route::put('/subject/{id}', [\App\Http\Controllers\SubjectController::class, 'update']);

Route::delete('/subject/{id}', [\App\Http\Controllers\SubjectController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
