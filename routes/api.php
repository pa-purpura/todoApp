<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/index', [TaskController::class,'index'])->name('tasks.index'); // Get all todos endpoint

Route::post('store', [TaskController::class,'store'])->name('tasks.store'); // Create todo endpoint

// Route::delete('/task/{id}', [TaskController::class,'delete'])->name('tasks.delete'); // Delete todo endpoint

// Route::put('/task_priority/{id}', [TaskController::class,'priority'])->name('tasks.edit'); // Change sort position endpoint

// Route::get('/task/{id}', [TaskController::class,'edit'])->name('tasks.edit');
// Route::put('/task/{id}', [TaskController::class,'update'])->name('tasks.update'); // Update todo endpoint
