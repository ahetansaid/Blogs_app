<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_view_posts_list()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_create_post()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post.',
            'image' => UploadedFile::fake()->image('post.jpg')
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post.'
        ]);
        Storage::disk('public')->assertExists('posts_images/post.jpg');
    }

    /** @test */
    public function authenticated_user_can_view_single_post()
    {
        $post = Post::factory()->create();

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_update_post()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put('/posts/' . $post->id, [
            'title' => 'Updated Title',
            'body' => 'Updated body.',
            'image' => UploadedFile::fake()->image('updated.jpg')
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('posts', [
            'title' => 'Updated Title',
            'body' => 'Updated body.'
        ]);
        Storage::disk('public')->assertExists('posts_images/updated.jpg');
    }

    /** @test */
    public function authenticated_user_can_delete_post()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete('/posts/' . $post->id);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    /** @test */
    public function user_can_search_posts()
    {
        $post = Post::factory()->create(['title' => 'Searchable Title', 'body' => 'Searchable body']);

        $response = $this->get('/posts/search?query=Searchable');

        $response->assertStatus(200);
        $response->assertSee($post->title);
    }
}

