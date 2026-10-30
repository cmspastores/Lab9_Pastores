<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthNavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_dashboard(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSeeText('Sign in');

        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_seeded_user_can_sign_in_and_sees_their_name_on_dashboard(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->post(route('login'), [
            'email' => 'nurse.pastores@bakuna.test',
            'password' => 'bakuna2026',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Hi, Carlos');
    }

    public function test_logout_returns_user_to_login_and_protects_dashboard(): void
    {
        $this->seed(DatabaseSeeder::class);
        $this->post(route('login'), [
            'email' => 'nurse.pastores@bakuna.test',
            'password' => 'bakuna2026',
        ]);

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
        $this->get(route('dashboard'))->assertRedirect(route('login'));
    }
}
