<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
  
  /*
   *  Get all todos endpoint
   */
  public function index(Request $request){

    $pages = $request->forPage;
    $limit = $request->limit;

    if (!isset($pages)) {
      $pages = 15;
    } else {
      $pages = $request->forPage;
    }

    if (!isset($limit)) {
      $limit = 15;
    } else {
      $limit = $request->limit;
    }

    $task = Task::limit($limit)->paginate($pages);

    return response()->json($task);

  }

  /*
   *  Get all todos, completed.
   */
  public function completed(Request $request){

    $pages = $request->forPage;
    $limit = $request->limit;

    if (!isset($pages)) {
      $pages = 15;
    } else {
      $pages = $request->forPage;
    }

    if (!isset($limit)) {
      $limit = 15;
    } else {
      $limit = $request->limit;
    }

    $task = Task::where('is_completed','=', 1)->limit($limit)->paginate($pages);

    return response()->json($task);

  }

  /*
   *  Get all todos, not completed.
   */
  public function not_completed(Request $request){

    $pages = $request->forPage;
    $limit = $request->limit;

    if (!isset($pages)) {
      $pages = 15;
    } else {
      $pages = $request->forPage;
    }

    if (!isset($limit)) {
      $limit = 15;
    } else {
      $limit = $request->limit;
    }

    $task = Task::where('is_completed','=', 0)->limit($limit)->paginate($pages);

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

    // WARNING !! to work well, first of all
    // the FE form needs this attribute: enctype="multipart/form-data"

    $data = $request->all();

    $validatedData = $request->validate([
      'title' => 'required',
      'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $new_todo = new Task();

    if (!isset($data['image'])) {
      $new_todo->img_name = 'no image';
      $new_todo->img_path = 'public/images/no_image.jpeg';
    } else {
      $new_todo->img_name = $request->file('image')->getClientOriginalName();
      $new_todo->img_path = $request->file('image')->store('public/images');
    }

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
