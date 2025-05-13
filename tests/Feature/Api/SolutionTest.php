<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Solution;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SolutionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_solutions_list(): void
    {
        $solutions = Solution::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.solutions.index'));

        $response->assertOk()->assertSee($solutions[0]->Background1);
    }

    /**
     * @test
     */
    public function it_stores_the_solution(): void
    {
        $data = Solution::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.solutions.store'), $data);

        $this->assertDatabaseHas('solutions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_solution(): void
    {
        $solution = Solution::factory()->create();

        $data = [
            'Background1' => $this->faker->text(255),
            'Slogan' => $this->faker->text(255),
            'Background2' => $this->faker->text(255),
            'Title' => $this->faker->sentence(10),
            'Description' => $this->faker->sentence(15),
            'Content' => $this->faker->text(),
        ];

        $response = $this->putJson(
            route('api.solutions.update', $solution),
            $data
        );

        $data['id'] = $solution->id;

        $this->assertDatabaseHas('solutions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_solution(): void
    {
        $solution = Solution::factory()->create();

        $response = $this->deleteJson(
            route('api.solutions.destroy', $solution)
        );

        $this->assertDeleted($solution);

        $response->assertNoContent();
    }
}
