<?php

namespace Tests\Feature;

use App\User;
use App\Models\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_job()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->json('POST', route('jobs.store'), [
                'name' => 'This is my job',
                'description' => 'description text',
            ]);

        $this->assertDatabaseHas('jobs', [
            'name' => 'This is my job',
        ]);
    }

    /** @test */
    public function user_can_update_their_job()
    {
        $user = factory(User::class)->create();
        $job = factory(Job::class)->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->json('PUT', route('jobs.update', $job->slug), [
                'name' => 'This is my jobs new text',
            ]);

        $this->assertDatabaseHas('jobs', [
            'name' => 'This is my jobs new text',
        ]);
    }
}
