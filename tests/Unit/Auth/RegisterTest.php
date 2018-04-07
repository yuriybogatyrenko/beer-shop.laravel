<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     */
    public function testValidation()
    {
        $this
            ->withHeader('Accept', 'application/json')
            ->post('api/auth/register')
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'email',
                'password',
                'name'
            ]);

        $user = [
            'email' => '123@mail.ru',
            'password' => '123123',
            'password_confirmation' => '321312',
            'name' => 'Yuriy'
        ];
        $this
            ->withHeader('accept', 'application/json')
            ->post('/api/auth/register', $user)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['password']);
    }

    public function testRegistrationSuccess()
    {
        $user = [
            'email' => '123@mail.ru',
            'password' => '123123',
            'password_confirmation' => '123123',
            'name' => 'Yuriy'
        ];

        $this
            ->withHeader('accept', 'application/json')
            ->post('/api/auth/register', $user)
            ->assertStatus(200)
            ->assertJson(['token']);
    }
}
