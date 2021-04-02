<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

use Illuminate\Http\Response;

use Faker\Factory as Faker;

class TaskTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function get_all_tasks()
  {

    $response = $this->getJson('/api/index')
                     ->assertStatus(200);
  }

  /** @test */
  public function it_can_create_a_task()
  {
    $request = Task::factory()->create();

    $this->postJson('/api/store', compact('request'))
         ->assertStatus(200);
  }

  /** @test */
  public function it_can_destroy_a_task()
  {
    $create_item_to_delete = Task::factory()->create([
            'title' => 'Todo to delete',
            'description' => 'Deleted Todo',
            'priority' => '99'
        ]);

    $find_item_to_delete = Task::where('priority','=', 99)->firstOrFail();

    $item_to_delete  = $find_item_to_delete->attributesToArray();

    $id = ($item_to_delete['id']);

    $response = $this->deleteJson('/api/task_delete/'.$id)
                     ->assertStatus(200);

  }

  /** @test */
public function it_can_update_the_task(){

  $create_item_to_update = Task::factory()->create([
            'title' => 'Todo to update',
            'description' => 'Updated Todo',
            'priority' => '99'
        ]);

  $find_item_to_update = Task::where('priority','=', 99)->first();
  $task = $find_item_to_update->attributesToArray();
  // dd($task);

  $task['title'] = 'New title updated!';
  $id = $task['id'];
  $title = $task['title'];


  $this->patchJson('api/task/'.$id, $task);
  $this->assertDatabaseHas('tasks',$task);

}

//end of class
}
