<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TechnologyStatus;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TechnologyStatusTest extends TestCase
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
    public function it_gets_technology_statuses_list(): void
    {
        $technologyStatuses = TechnologyStatus::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.technology-statuses.index'));

        $response->assertOk()->assertSee($technologyStatuses[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_technology_status(): void
    {
        $data = TechnologyStatus::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.technology-statuses.store'),
            $data
        );

        $this->assertDatabaseHas('technology_statuses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_technology_status(): void
    {
        $technologyStatus = TechnologyStatus::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.technology-statuses.update', $technologyStatus),
            $data
        );

        $data['id'] = $technologyStatus->id;

        $this->assertDatabaseHas('technology_statuses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_technology_status(): void
    {
        $technologyStatus = TechnologyStatus::factory()->create();

        $response = $this->deleteJson(
            route('api.technology-statuses.destroy', $technologyStatus)
        );

        $this->assertDeleted($technologyStatus);

        $response->assertNoContent();
    }
}
