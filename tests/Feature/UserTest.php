<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usersCanChangeTheirName()
    {
        $user = factory(User::class)->create(['name' => 'Jimmy']);

        $this->actingAs($user)
            ->json('PUT', route('users.update', $user->id), [
                'name' => 'John Doe',
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
        ]);
    }

    /** @test */
    public function usersCanChangeTheirEmail()
    {
        $user = factory(User::class)->create(['name' => 'Jimmy', 'email' => 'jimmy@email.com']);

        $this->actingAs($user)
            ->json('PUT', route('users.update', $user->id), [
                'email' => 'john@email.com',
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@email.com',
        ]);
    }

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
    public function userCantChangePasswordIfCurrentPasswordIsIncorrect()
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
}
