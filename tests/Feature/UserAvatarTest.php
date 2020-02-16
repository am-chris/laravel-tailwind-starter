<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPhotoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testAvatarUpload()
    {
        $user = factory(User::class)->create(['avatar_path' => 'test.jpg']);

        Storage::fake('public');

        $response = $this->actingAs($user)
            ->json('POST', route('users.avatars.store', $user->id), [
                'avatar' => UploadedFile::fake()->image('avatar.png')
            ]);

        // Assert the file was stored...
        Storage::disk('public')->assertExists($response->decodeResponseJson()['path']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'avatar_path' => $response->decodeResponseJson()['path'],
        ]);
    }
}
