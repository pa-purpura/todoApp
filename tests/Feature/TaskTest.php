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

    $this->postJson('/api/store', compact('request'));
         ->assertStatus(200);
  }

//end of class
}
