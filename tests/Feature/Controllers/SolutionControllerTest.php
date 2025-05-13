<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Solution;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SolutionControllerTest extends TestCase
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
    public function it_displays_index_view_with_solutions(): void
    {
        $solutions = Solution::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('solutions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.solutions.index')
            ->assertViewHas('solutions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_solution(): void
    {
        $response = $this->get(route('solutions.create'));

        $response->assertOk()->assertViewIs('app.solutions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_solution(): void
    {
        $data = Solution::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('solutions.store'), $data);

        $this->assertDatabaseHas('solutions', $data);

        $solution = Solution::latest('id')->first();

        $response->assertRedirect(route('solutions.edit', $solution));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_solution(): void
    {
        $solution = Solution::factory()->create();

        $response = $this->get(route('solutions.show', $solution));

        $response
            ->assertOk()
            ->assertViewIs('app.solutions.show')
            ->assertViewHas('solution');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_solution(): void
    {
        $solution = Solution::factory()->create();

        $response = $this->get(route('solutions.edit', $solution));

        $response
            ->assertOk()
            ->assertViewIs('app.solutions.edit')
            ->assertViewHas('solution');
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

        $response = $this->put(route('solutions.update', $solution), $data);

        $data['id'] = $solution->id;

        $this->assertDatabaseHas('solutions', $data);

        $response->assertRedirect(route('solutions.edit', $solution));
    }

    /**
     * @test
     */
    public function it_deletes_the_solution(): void
    {
        $solution = Solution::factory()->create();

        $response = $this->delete(route('solutions.destroy', $solution));

        $response->assertRedirect(route('solutions.index'));

        $this->assertDeleted($solution);
    }
}
