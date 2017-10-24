<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Folder;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
     public function add_folder(){
       $folder = factory('App\Folder')->make();
       $response = $this->post('/api/folder', $folder->toArray());
       $response->assertStatus(200);
       $response->assertSee('Folder Succesfully Added');
     }
}
