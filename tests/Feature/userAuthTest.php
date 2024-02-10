<?php

namespace Tests\Feature;

use App\Models\JobPost;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class userAuthTest extends TestCase
{
   use RefreshDatabase;
   public function createUser(){
    return User::factory()->create();
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
    $response->assertRedirect('/');
}
    
public function test_invalid_username_or_password(){
    User::factory()->create([
        'name'=>'udith',
        'email'=>'udith@gmail.com',
        'password'=>bcrypt(''),
    ]);
    $response=$this->post("/user/authenticate",[
        'name'=>'udith',
        'email'=>'udith@gmail.com',
        'password'=>'1234'
    ]);


    // $response->assertStatus(200);    
    $response->assertSessionHasErrors('email','Invalid email or password');
}   
public function test_login_with_blank_username_and_password(){
    User::factory()->create([
        'name'=>'udith',
        'email'=>'udith@gmail.com',
        'password'=>bcrypt('1234'),
    ]);
    $response=$this->post("/user/authenticate",[
        'name'=>'udith',
        'email'=>'',
        'password'=>''
    ]);


   
    $response->assertSessionHasErrors('email','Invalid email or password');

     
}   

    public function test_unauthenticated_user_cannot_access_mange_post_page()
    {
        $response = $this->get('/manage');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }


    public function test_unauthenticated_user_cannot_access_edit_post_page()
    {
        $this->createUser();
        $job=JobPost::factory()->create();
        $response = $this->get('/job/edit/' . $job->id);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        
        
    }

    

}
