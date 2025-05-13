<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Technology;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TechnologyTest extends TestCase
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
    public function it_gets_technologies_list(): void
    {
        $technologies = Technology::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.technologies.index'));

        $response->assertOk()->assertSee($technologies[0]->Background);
    }

    /**
     * @test
     */
    public function it_stores_the_technology(): void
    {
        $data = Technology::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.technologies.store'), $data);

        $this->assertDatabaseHas('technologies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_technology(): void
    {
        $technology = Technology::factory()->create();

        $data = [
            'Background' => $this->faker->name(),
            'Slogan' => $this->faker->text(255),
            'SubTitle' => $this->faker->text(255),
            'Description' => $this->faker->text(),
            'categories_id' => $this->faker->randomNumber(),
        ];

        $response = $this->putJson(
            route('api.technologies.update', $technology),
            $data
        );

        $data['id'] = $technology->id;

        $this->assertDatabaseHas('technologies', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_technology(): void
    {
        $technology = Technology::factory()->create();

        $response = $this->deleteJson(
            route('api.technologies.destroy', $technology)
        );

        $this->assertDeleted($technology);

        $response->assertNoContent();
    }
}
