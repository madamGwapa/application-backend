<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkpaperTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
     public function test_add_paper(){
       $paper = factory('App\Workpaper')->make();
       $response = $this->post('/api/work-paper', $folder->toArray());
       $response->assertStatus(200);
       $response->assertSee('Workpaper Succesfully Added');
     }

     public function test_update_paper()
     {
        $paper = factory('App\Workpaper')->create();
        $edit = factory('App\Workpaper')->make();
        $response = $this->patch('/api/work-paper/'.$paper->id, $edit->toArray());
        $response->assertStatus(200);
        $response->assertSee('Folder Succesfully Updated');
      }

      public function test_delete_paper(){
        $folder = factory('App\Workpaper')->create();
        $response = $this->delete('/api/work-paper/'.$folder->id);
        $response->assertStatus(200);
        $response->assertSee('Workpaper Succesfully Deleted');
      }

      public function test_view_papers()
      {
        $folder = factory('App\Workpaper', 10)->create();
        $json = json_encode(Workpaper::all());
        $response = $this->get('/api/work-paper');
        $response->assertStatus(200);
        $response->assertSee($json);
      }
}
