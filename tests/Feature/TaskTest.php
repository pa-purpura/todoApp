<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

use Illuminate\Http\Response;

use Faker\Factory as Faker;

// AOC-142 / AOC-221 [PHP]
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
  public function get_all_tasks_completed()
  {
    $response = $this->getJson('/api/tasks_completed')
                     ->assertStatus(200);
  }

  /** @test */
  public function get_all_tasks_not_completed()
  {
    $response = $this->getJson('/api/tasks_not_completed')
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
            'img' => 'https://picsum.photos/600/480',
            'is_completed' => false
        ]);

    $find_item_to_delete = Task::where('title','=', 'Todo to delete')->firstOrFail();

    $item_to_delete  = $find_item_to_delete->attributesToArray();

    $id = ($item_to_delete['id']);

    $response = $this->deleteJson('/api/task_delete/'.$id)
                     ->assertStatus(200);

  }

  /** @test */
public function it_can_update_the_task(){

  $create_item_to_update = Task::factory()->create([
            'title' => 'Todo to update',
            'img' => 'https://picsum.photos/600/480',
            'is_completed' => false
        ]);

  $find_item_to_update = Task::where('title','=', 'Todo to update')->first();
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
