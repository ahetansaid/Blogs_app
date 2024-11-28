<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        $response = $this->post('/register', [
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }

    /** @test */
    public function user_can_login()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_can_verify_email()
    {
        // Assuming you have setup email verification
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get('/email/verify');

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_resend_verification_email()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->post('/email/resend');

        $response->assertRedirect()->with('message', 'Verification link sent!');
    }

    /** @test */
    public function user_can_update_profile()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post('/profile', [
            'name' => 'New Name',
            'email' => 'newemail@example.com'
        ]);

        $response->assertRedirect('/profile');
        $this->assertDatabaseHas('users', [
            'name' => 'New Name',
            'email' => 'newemail@example.com'
        ]);
    }

    /** @test */
    public function user_can_delete_account()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post('/delete-account');

        $response->assertRedirect('/');
        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
