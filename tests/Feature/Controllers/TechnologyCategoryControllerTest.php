<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TechnologyCategory;

use App\Models\Technology;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TechnologyCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_technology_categories(): void
    {
        $technologyCategories = TechnologyCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('technology-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.technology_categories.index')
            ->assertViewHas('technologyCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_technology_category(): void
    {
        $response = $this->get(route('technology-categories.create'));

        $response->assertOk()->assertViewIs('app.technology_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_technology_category(): void
    {
        $data = TechnologyCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('technology-categories.store'), $data);

        $this->assertDatabaseHas('technology_categories', $data);

        $technologyCategory = TechnologyCategory::latest(
            'category_id'
        )->first();

        $response->assertRedirect(
            route('technology-categories.edit', $technologyCategory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_technology_category(): void
    {
        $technologyCategory = TechnologyCategory::factory()->create();

        $response = $this->get(
            route('technology-categories.show', $technologyCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.technology_categories.show')
            ->assertViewHas('technologyCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_technology_category(): void
    {
        $technologyCategory = TechnologyCategory::factory()->create();

        $response = $this->get(
            route('technology-categories.edit', $technologyCategory)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.technology_categories.edit')
            ->assertViewHas('technologyCategory');
    }

    /**
     * @test
     */
    public function it_updates_the_technology_category(): void
    {
        $technologyCategory = TechnologyCategory::factory()->create();

        $technology = Technology::factory()->create();

        $data = [
            'name' => $this->faker->text(255),
            'category_id' => $technology->id,
        ];

        $response = $this->put(
            route('technology-categories.update', $technologyCategory),
            $data
        );

        $data['category_id'] = $technologyCategory->category_id;

        $this->assertDatabaseHas('technology_categories', $data);

        $response->assertRedirect(
            route('technology-categories.edit', $technologyCategory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_technology_category(): void
    {
        $technologyCategory = TechnologyCategory::factory()->create();

        $response = $this->delete(
            route('technology-categories.destroy', $technologyCategory)
        );

        $response->assertRedirect(route('technology-categories.index'));

        $this->assertDeleted($technologyCategory);
    }
}
