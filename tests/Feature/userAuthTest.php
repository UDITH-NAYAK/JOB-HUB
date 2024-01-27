<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class userAuthTest extends TestCase
{
   use RefreshDatabase;
    public function test_unauthenticated_user_cannot_access_mange_post_page()
    {
        $response = $this->get('/manage');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        
    }

    public function test_login_redirects_to_home_page(){
        User::factory()->create([
            'name'=>'udith',
            'email'=>'udith@gmail.com',
            'password'=>bcrypt('1234'),
        ]);
        $response=$this->post("/user/authenticate",[
            'name'=>'udith',
            'email'=>'udith@gmail.com',
            'password'=>'1234'
        ]);


        // $response->assertStatus(200);    
        $response->assertRedirect('/');
    }   

}
