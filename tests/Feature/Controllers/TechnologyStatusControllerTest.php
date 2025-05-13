<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TechnologyStatus;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TechnologyStatusControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_technology_statuses(): void
    {
        $technologyStatuses = TechnologyStatus::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('technology-statuses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.technology_statuses.index')
            ->assertViewHas('technologyStatuses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_technology_status(): void
    {
        $response = $this->get(route('technology-statuses.create'));

        $response->assertOk()->assertViewIs('app.technology_statuses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_technology_status(): void
    {
        $data = TechnologyStatus::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('technology-statuses.store'), $data);

        $this->assertDatabaseHas('technology_statuses', $data);

        $technologyStatus = TechnologyStatus::latest('id')->first();

        $response->assertRedirect(
            route('technology-statuses.edit', $technologyStatus)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_technology_status(): void
    {
        $technologyStatus = TechnologyStatus::factory()->create();

        $response = $this->get(
            route('technology-statuses.show', $technologyStatus)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.technology_statuses.show')
            ->assertViewHas('technologyStatus');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_technology_status(): void
    {
        $technologyStatus = TechnologyStatus::factory()->create();

        $response = $this->get(
            route('technology-statuses.edit', $technologyStatus)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.technology_statuses.edit')
            ->assertViewHas('technologyStatus');
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

        $response = $this->put(
            route('technology-statuses.update', $technologyStatus),
            $data
        );

        $data['id'] = $technologyStatus->id;

        $this->assertDatabaseHas('technology_statuses', $data);

        $response->assertRedirect(
            route('technology-statuses.edit', $technologyStatus)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_technology_status(): void
    {
        $technologyStatus = TechnologyStatus::factory()->create();

        $response = $this->delete(
            route('technology-statuses.destroy', $technologyStatus)
        );

        $response->assertRedirect(route('technology-statuses.index'));

        $this->assertDeleted($technologyStatus);
    }
}
