<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Technology;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TechnologyControllerTest extends TestCase
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
    public function it_displays_index_view_with_technologies(): void
    {
        $technologies = Technology::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('technologies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.technologies.index')
            ->assertViewHas('technologies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_technology(): void
    {
        $response = $this->get(route('technologies.create'));

        $response->assertOk()->assertViewIs('app.technologies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_technology(): void
    {
        $data = Technology::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('technologies.store'), $data);

        $this->assertDatabaseHas('technologies', $data);

        $technology = Technology::latest('id')->first();

        $response->assertRedirect(route('technologies.edit', $technology));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_technology(): void
    {
        $technology = Technology::factory()->create();

        $response = $this->get(route('technologies.show', $technology));

        $response
            ->assertOk()
            ->assertViewIs('app.technologies.show')
            ->assertViewHas('technology');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_technology(): void
    {
        $technology = Technology::factory()->create();

        $response = $this->get(route('technologies.edit', $technology));

        $response
            ->assertOk()
            ->assertViewIs('app.technologies.edit')
            ->assertViewHas('technology');
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

        $response = $this->put(
            route('technologies.update', $technology),
            $data
        );

        $data['id'] = $technology->id;

        $this->assertDatabaseHas('technologies', $data);

        $response->assertRedirect(route('technologies.edit', $technology));
    }

    /**
     * @test
     */
    public function it_deletes_the_technology(): void
    {
        $technology = Technology::factory()->create();

        $response = $this->delete(route('technologies.destroy', $technology));

        $response->assertRedirect(route('technologies.index'));

        $this->assertDeleted($technology);
    }
}
