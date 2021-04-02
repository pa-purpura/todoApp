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
    // AOC-142 / AOC-221 [PHP] Unit testing
    //
    // AOC-142 / AOC-220 [PHP] Change sort position endpoint
    //
    // AOC-142 / AOC-219 [PHP] Delete todo endpoint @done!
    //
    // AOC-142 / AOC-217 [PHP] Get all todos endpoint @done!
    //
    // AOC-142 / AOC-216 [PHP] Create todo endpoint @done!
    //
    // AOC-142 / AOC-218 [PHP] Update todo endpoint @done!


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('index', [TaskController::class,'index']); // Get all todos endpoint

Route::get('/task/{id}', [TaskController::class,'edit']); // Get a single todo endpoint with its details.
Route::patch('/task/{id}', [TaskController::class,'update']); // Update todo endpoint

Route::post('store', [TaskController::class,'store']); // Create todo endpoint

Route::delete('/task_delete/{id}', [TaskController::class,'delete']); // Delete todo endpoint

// Route::put('/task_priority/{id}', [TaskController::class,'priority'])->name('tasks.edit'); // Change sort position endpoint







// jff
