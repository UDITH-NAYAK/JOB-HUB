<?php

namespace Tests\Feature;

use App\Models\JobPost;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    
    use RefreshDatabase;

    public function createUser(){
        return User::factory()->create();
    }
    public function createJobs(){
        return  JobPost::factory(10)->create();

    }
    public function test_home_page_contains_empty_post()
    {
       
        $response = $this->get('/');
        $response->assertSee('Jobs not found');
        $response->assertStatus(200);
    }


    public function test_home_page_contains_post()
    {
        $user=$this->createUser();
        $this->createJobs();
        $response = $this->get('/');
        $response->assertDontSee('Jobs not found');
        $response->assertStatus(200);
    }


    public function test_home_page_contain_only_5_post(){
        $user=$this->createUser();
        $jobs=JobPost::factory(10)->create();
        $lastjob=$jobs->last();
            
        $response = $this->actingAs($user)->get('/');
        $response->assertViewHas('jobs',function($collection) use ($lastjob){
            return !$collection->contains($lastjob);
        });
    }

    public function test_apply_button_is_enabled_for_logged_in_user(){
        $user=$this->createUser();
        $job=JobPost::factory()->create();

        $response=$this->actingAs($user)->get("/");
        $response->assertSee('Apply');
         
    }
}
