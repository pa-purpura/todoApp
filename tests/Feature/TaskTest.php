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
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');
    //
    //     $response->assertStatus(200);
    // }
    
  /** @test */
  public function it_can_create_a_task()
  {
    $request = Task::factory()->create();

    $this->postJson('/api/store', compact('request'))
        ->assertStatus(200);
  }

//end of class
}
