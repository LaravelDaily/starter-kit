<?php

namespace Tests\Feature\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TwoFactorAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_two_factor_settings_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['auth.password_confirmed_at' => time()])
            ->get('/settings/two-factor');

        $response->assertOk();
        $response->assertSee('Two-Factor Authentication');
        $response->assertSee('Add additional security to your account');
    }

    public function test_two_factor_challenge_page_is_displayed(): void
    {

        $response = $this->get('/two-factor-challenge');
        $response->assertRedirect('/login');
    }
}
