<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
  // @Index,

  /*
   *  Create todo endpoint
  */
  public function store(Request $request){

    $data = $request->all();

    $new_task = new Task();

    $new_task->fill($data);

    try {
      $new_task->save();
    }
    catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'result' => $e->getMessage(),
      ]);
    }

    return response()->json([
      'result' => $new_task,
    ]);

  }
  // @delete,
  // @edit,
  // @edit,
  // @update,

//end of class
}
