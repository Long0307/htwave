<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AwardsAndCertification;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AwardsAndCertificationControllerTest extends TestCase
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
    public function it_displays_index_view_with_awards_and_certifications(): void
    {
        $awardsAndCertifications = AwardsAndCertification::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('awards-and-certifications.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.awards_and_certifications.index')
            ->assertViewHas('awardsAndCertifications');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_awards_and_certification(): void
    {
        $response = $this->get(route('awards-and-certifications.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.awards_and_certifications.create');
    }

    /**
     * @test
     */
    public function it_stores_the_awards_and_certification(): void
    {
        $data = AwardsAndCertification::factory()
            ->make()
            ->toArray();

        $response = $this->post(
            route('awards-and-certifications.store'),
            $data
        );

        $this->assertDatabaseHas('awards_and_certifications', $data);

        $awardsAndCertification = AwardsAndCertification::latest('id')->first();

        $response->assertRedirect(
            route('awards-and-certifications.edit', $awardsAndCertification)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_awards_and_certification(): void
    {
        $awardsAndCertification = AwardsAndCertification::factory()->create();

        $response = $this->get(
            route('awards-and-certifications.show', $awardsAndCertification)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.awards_and_certifications.show')
            ->assertViewHas('awardsAndCertification');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_awards_and_certification(): void
    {
        $awardsAndCertification = AwardsAndCertification::factory()->create();

        $response = $this->get(
            route('awards-and-certifications.edit', $awardsAndCertification)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.awards_and_certifications.edit')
            ->assertViewHas('awardsAndCertification');
    }

    /**
     * @test
     */
    public function it_updates_the_awards_and_certification(): void
    {
        $awardsAndCertification = AwardsAndCertification::factory()->create();

        $data = [
            'images' => $this->faker->text(255),
            'title' => $this->faker->text(255),
            'description' => $this->faker->text(255),
            'link' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('awards-and-certifications.update', $awardsAndCertification),
            $data
        );

        $data['id'] = $awardsAndCertification->id;

        $this->assertDatabaseHas('awards_and_certifications', $data);

        $response->assertRedirect(
            route('awards-and-certifications.edit', $awardsAndCertification)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_awards_and_certification(): void
    {
        $awardsAndCertification = AwardsAndCertification::factory()->create();

        $response = $this->delete(
            route('awards-and-certifications.destroy', $awardsAndCertification)
        );

        $response->assertRedirect(route('awards-and-certifications.index'));

        $this->assertDeleted($awardsAndCertification);
    }
}
