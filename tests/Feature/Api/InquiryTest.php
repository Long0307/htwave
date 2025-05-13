<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Inquiry;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InquiryTest extends TestCase
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
    public function it_gets_inquiries_list(): void
    {
        $inquiries = Inquiry::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.inquiries.index'));

        $response->assertOk()->assertSee($inquiries[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_inquiry(): void
    {
        $data = Inquiry::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.inquiries.store'), $data);

        $this->assertDatabaseHas('inquiries', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_inquiry(): void
    {
        $inquiry = Inquiry::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phoneNumber' => $this->faker->text(255),
            'enquiries' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.inquiries.update', $inquiry),
            $data
        );

        $data['id'] = $inquiry->id;

        $this->assertDatabaseHas('inquiries', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_inquiry(): void
    {
        $inquiry = Inquiry::factory()->create();

        $response = $this->deleteJson(route('api.inquiries.destroy', $inquiry));

        $this->assertDeleted($inquiry);

        $response->assertNoContent();
    }
}
