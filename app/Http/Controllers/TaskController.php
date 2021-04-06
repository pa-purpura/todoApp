<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
  // public function test(){
  //   $id = 2;
  //   $test = Task::findOrFail($id);
  //
  //   dd($test);
  // }
  /*
   *  Get all todos endpoint
   */
  public function index(){

    $task = Task::all();

    return response()->json($task);

  }

  /*
   *  Get all todos, completed.
   */
  public function completed(){

    $task = Task::where('is_completed','=', 1)->get();

    return response()->json($task);

  }

  /*
   *  Get all todos, not completed.
   */
  public function not_completed(){

    $task = Task::where('is_completed','=', 0)->get();

    return response()->json($task);

  }

  /*
   *  Get a single todo endpoint
   */
  public function edit($id){

    return response()->json(Task::find($id));

  }
  /*
   *  Create todo endpoint
   */
  public function store(Request $request){

    $data = $request->all();

    $new_todo = new Task();

    $new_todo->fill($data);

    try {
      $new_todo->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
      'result' => $new_todo,
    ]);

  }
  /*
   *  Delete todo endpoint
   */
  public function delete($id){

    // $id = $request["id"];

    $todo_to_delete = Task::find($id);

    try {
      $todo_to_delete->delete();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
        'success' => true,
        'result' => $todo_to_delete,
      ]);
  }
  /*
   *  Update todo endpoint
   */
  public function update(Request $request, $id){

    $todo_to_update = Task::find($id);

    $todo_to_update->fill($request->all());

    try {
      $todo_to_update->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }
    return response()->json([
      'success' => true,
      'result' => $todo_to_update,
    ]);
  }
//end of class
}
