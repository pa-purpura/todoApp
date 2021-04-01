<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
  // public function test(){
  //   $test= Task::where('priority','=', 99)->firstOrFail();
  //   dd($test);
  // }
  /*
   *  Get all todos endpoint
   */
  public function index(){

    $task = Task::orderBy('priority', 'desc')
              ->get();

    return response()->json($task);

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
  public function delete(Request $request){

    $id = $request["id"];

    // dd($id);

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
  // @edit,
  // @edit,
  // @update,

//end of class
}
