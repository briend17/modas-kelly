<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations,HasFactory;

    public function test_visit_page_of_login()
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSee('login');
    }

    public function test_authenticated_to_a_user()
    {
        $user = User::factory()->make([
            "email" => "user@mail.com",
            "password" => bcrypt('secret')
        ]);

        $this->get('/login')->assertSee('login');
        $credentials = [
            "email" => "user@mail.com",
            "password" => "secret"
        ];

        $response = $this->post('/login', $credentials);

        $this->assertCredentials($credentials);
    }
}
