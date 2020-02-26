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
    public function guestCannotChangeAUsersDetails()
    {
        $user = factory(User::class)->create(['name' => 'Jimmy', 'email' => 'jimmy@email.com']);

        $this->json('PUT', route('users.update', $user->id), [
            'email' => 'john@email.com',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'jimmy@email.com',
        ]);
    }

    /** @test */
    public function userCannotChangeAnotherUsersDetails()
    {
        $user = factory(User::class)->create(['name' => 'Jimmy', 'email' => 'jimmy@email.com']);
        $user2 = factory(User::class)->create(['name' => 'John', 'email' => 'john@email.com']);

        $this->actingAs($user2)
            ->json('PUT', route('users.update', $user->id), [
                'email' => 'john2@email.com',
            ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'john2@email.com',
        ]);
    }
}
