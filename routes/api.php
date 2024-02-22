<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MjuStudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('mju',MjuStudentController::class);

Route::put('putdata/{student_code}', [MjuStudentController::class, 'update']);

Route::get('show/{student_code}', [MjuStudentController::class, 'show']);

Route::delete('delete/{student_code}', [MjuStudentController::class, 'destroy']);