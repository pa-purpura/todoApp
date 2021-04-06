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

Route::get('index', [TaskController::class,'index']); // Get all todos endpoint - AOC-142 / AOC-217 [PHP]

Route::get('/tasks_completed', [TaskController::class,'completed']); // Get all todos completed endpoint. - AOC-142 / AOC-220 [PHP]
Route::get('/tasks_not_completed', [TaskController::class,'not_completed']); // Get all todos not completed endpoint. - AOC-142 / AOC-220 [PHP]

Route::get('/task/{id}', [TaskController::class,'edit']); // Get a single todo endpoint with its details.
Route::patch('/task/{id}', [TaskController::class,'update']); // Update todo endpoint - AOC-142 / AOC-218 [PHP]

Route::post('store', [TaskController::class,'store']); // Create todo endpoint - AOC-142 / AOC-216 [PHP]

Route::delete('/task_delete/{id}', [TaskController::class,'delete']); // Delete todo endpoint - AOC-142 / AOC-219 [PHP]








// jff
