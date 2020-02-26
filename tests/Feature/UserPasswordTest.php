<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function userCanChangeTheirPassword()
    {
        $user = factory(User::class)->create(['password' => bcrypt('password')]);

        $this->actingAs($user)
            ->json('PUT', route('users.update_password', $user->id), [
                'current_password' => 'password',
                'new_password' => 'password2',
                'new_password_confirmation' => 'password2',
            ]);

        $user->refresh();

        $this->assertTrue(Hash::check('password2', $user->password));
    }

    /** @test */
    public function userCannotChangePasswordIfCurrentPasswordIsIncorrect()
    {
        $user = factory(User::class)->create(['password' => bcrypt('password')]);

        $this->actingAs($user)
            ->json('PUT', route('users.update_password', $user->id), [
                'current_password' => 'password',
                'new_password' => 'password2',
                'new_password_confirmation' => 'password2',
            ]);

        $user->refresh();

        $this->assertTrue(Hash::check('password2', $user->password));
    }

    /** @test */
    public function guestCannotChangeAnotherUsersPassword()
    {
        $user = factory(User::class)->create(['password' => bcrypt('password')]);

        $this->json('PUT', route('users.update_password', $user->id), [
            'current_password' => 'password',
            'new_password' => 'password2',
            'new_password_confirmation' => 'password2',
        ]);

        $user->refresh();

        $this->assertTrue(Hash::check('password', $user->password));
    }

    /** @test */
    public function userCannotChangeAnotherUsersPassword()
    {
        $user = factory(User::class)->create(['password' => bcrypt('password')]);
        $user2 = factory(User::class)->create();

        $this->actingAs($user2)
            ->json('PUT', route('users.update_password', $user->id), [
                'current_password' => 'password',
                'new_password' => 'password2',
                'new_password_confirmation' => 'password2',
            ]);

        $user->refresh();

        $this->assertTrue(Hash::check('password', $user->password));
    }
}
