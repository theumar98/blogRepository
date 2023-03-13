<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_post_create_returns_a_successful_response(): void
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(200);
    }

    public function test_create_new_post(): void
    {
        $response = $this->from(route('posts.create'))
            ->post(route('posts.store'),[
            "title" => "about us",
            "description" => "this is about us page"
        ]);
        $this->assertEquals(1,Post::count());

        // check route back
        // $response->assertRedirect(route('posts.create'));

        // check data inserted in db
        $post = Post::first();
        $this->assertEquals($post->title,"about us");
        $this->assertEquals($post->description,"this is about us page");
    }

    public function test_listing_post(): void
    {
        $this->from(route('posts.create'))
             ->post(route('posts.store'),[
                "title" => "about us",
                "description" => "this is about us page"
            ]);

        $this->from(route('posts.create'))
             ->post(route('posts.store'),[
                "title" => "about us c",
                "description" => "this is about us page"
            ]);

        $this->from(route('posts.create'))
             ->post(route('posts.store'),[
                "title" => "about us cc",
                "description" => "this is about us page"
            ]);

        $this->assertEquals(3,Post::count());
    }
}
