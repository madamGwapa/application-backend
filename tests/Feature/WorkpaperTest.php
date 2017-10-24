<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Workpaper;

class WorkpaperTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
     /** @test */
     public function add_paper(){
       $paper = factory('App\Workpaper')->make();
       $response = $this->post('/api/work-paper', $paper->toArray());
       $response->assertStatus(200);
       $response->assertSee('Workpaper Added Succesfully');
     }

     /** @test */
     public function update_paper()
     {
        $paper = factory('App\Workpaper')->create();
        $edit = factory('App\Workpaper')->make();
        $response = $this->patch('/api/work-paper/'.$paper->id, $edit->toArray());
        $response->assertStatus(200);
        $response->assertSee('Workpaper Updated Succesfully');
      }

      /** @test */
      public function delete_paper(){

        $paper = factory('App\Workpaper')->create();
        $response = $this->delete('/api/work-paper/'.$paper->reference);
        $response->assertStatus(200);
        $response->assertSee('Workpaper Deleted Succesfully');
      }

      /** @test */
      public function view_papers()
      {
        $folder = factory('App\Workpaper', 10)->create();
        $json = json_encode(Workpaper::all());
        $response = $this->get('/api/work-paper');
        $response->assertStatus(200);
        $response->assertSee($json);
      }
}
