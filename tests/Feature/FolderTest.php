<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Folder;

class FolderTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
     public function test_add_folder(){
       $folder = factory('App\Folder')->make();
       $response = $this->post('/api/folder', $folder->toArray());
       $response->assertStatus(200);
       $response->assertSee('Folder Succesfully Added');
     }

     public function test_update_folder()
     {
        $folder = factory('App\Folder')->create();
        $edit = factory('App\Folder')->make();
        $response = $this->patch('/api/folder/'.$folder->id, $edit->toArray());
        $response->assertStatus(200);
        $response->assertSee('Folder Succesfully Updated');
      }

      public function test_delete_folder(){
        $folder = factory('App\Folder')->create();
        $response = $this->delete('/api/folder/'.$folder->id);
        $response->assertStatus(200);
        $response->assertSee('Folder Succesfully Deleted');
      }

      public function test_view_folders()
      {
        $folder = factory('App\Folder', 10)->create();
        $json = json_encode(Folder::all());
        $response = $this->get('/api/folder');
        $response->assertStatus(200);
        $response->assertSee($json);
      }

      public function test_view_folder_papers(){
        $folder = factory('App\Folder')->create();
        factory('App\WorkPaper', 10, ['folder_id' => $folder->id])->create();
        $response = $this->get('/api/folder/'.$folder->code);
        $response->assertStatus(200);
      }

}
