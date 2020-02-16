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
}
