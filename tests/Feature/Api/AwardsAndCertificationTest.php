<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AwardsAndCertification;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AwardsAndCertificationTest extends TestCase
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
    public function it_gets_awards_and_certifications_list(): void
    {
        $awardsAndCertifications = AwardsAndCertification::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(
            route('api.awards-and-certifications.index')
        );

        $response->assertOk()->assertSee($awardsAndCertifications[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_awards_and_certification(): void
    {
        $data = AwardsAndCertification::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.awards-and-certifications.store'),
            $data
        );

        $this->assertDatabaseHas('awards_and_certifications', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route(
                'api.awards-and-certifications.update',
                $awardsAndCertification
            ),
            $data
        );

        $data['id'] = $awardsAndCertification->id;

        $this->assertDatabaseHas('awards_and_certifications', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_awards_and_certification(): void
    {
        $awardsAndCertification = AwardsAndCertification::factory()->create();

        $response = $this->deleteJson(
            route(
                'api.awards-and-certifications.destroy',
                $awardsAndCertification
            )
        );

        $this->assertDeleted($awardsAndCertification);

        $response->assertNoContent();
    }
}
