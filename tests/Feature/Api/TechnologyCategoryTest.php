<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\TechnologyCategory;

use App\Models\Technology;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TechnologyCategoryTest extends TestCase
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
    public function it_gets_technology_categories_list(): void
    {
        $technologyCategories = TechnologyCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.technology-categories.index'));

        $response->assertOk()->assertSee($technologyCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_technology_category(): void
    {
        $data = TechnologyCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.technology-categories.store'),
            $data
        );

        $this->assertDatabaseHas('technology_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.technology-categories.update', $technologyCategory),
            $data
        );

        $data['category_id'] = $technologyCategory->category_id;

        $this->assertDatabaseHas('technology_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_technology_category(): void
    {
        $technologyCategory = TechnologyCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.technology-categories.destroy', $technologyCategory)
        );

        $this->assertDeleted($technologyCategory);

        $response->assertNoContent();
    }
}
