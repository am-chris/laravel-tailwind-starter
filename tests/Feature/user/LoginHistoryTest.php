<?php

namespace Tests\Feature\user;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginHistoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function userDeviceInfoIsSavedWhenUserLogsIn()
    {
        $user = factory(User::class)->create(['email' => 'test@test.com', 'password' => bcrypt('password')]);

        $this->json('POST', route('login'), [
            'email' => 'test@test.com',
            'password' => 'password',
        ]);

        $this->assertDatabaseHas('login_history', [
            'user_id' => $user->id,
        ]);
    }

    /** @test **/
    public function userDeviceInfoIsNotSavedWhenUserInputsIncorrectLoginCredentials()
    {
        $user = factory(User::class)->create(['email' => 'test@test.com', 'password' => bcrypt('password')]);

        $this->json('POST', route('login'), [
            'email' => 'test@test.com',
            'password' => 'password55555',
        ]);

        $this->assertDatabaseMissing('login_history', [
            'user_id' => $user->id,
        ]);
    }
}
