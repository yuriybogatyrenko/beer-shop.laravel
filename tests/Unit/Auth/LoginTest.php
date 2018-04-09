<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     */
    public function testValidation()
    {
        $this
            ->withHeader('Accept', 'application/json')
            ->post('api/auth/login')
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'email',
                'password'
            ]);
    }

    public function testBadCredentials() {
        $user = factory(User::class)->create([
            'password' => bcrypt('123123'),
        ]);

        $this
            ->withHeader('accept', 'application/json')
            ->post('/api/auth/login', ['email' => $user->email, 'password' => '3213121'])
            ->assertStatus(401);
    }

    public function testLoginSuccess()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('123123'),
        ]);

        $this
            ->withHeader('accept', 'application/json')
            ->post('/api/auth/login', ['email' => $user->email, 'password' => '123123'])
            ->assertStatus(200)
            ->assertJsonStructure(['token', 'user']);
    }
}
