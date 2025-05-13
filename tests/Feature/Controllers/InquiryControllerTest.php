<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Inquiry;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InquiryControllerTest extends TestCase
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
    public function it_displays_index_view_with_inquiries(): void
    {
        $inquiries = Inquiry::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('inquiries.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.inquiries.index')
            ->assertViewHas('inquiries');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_inquiry(): void
    {
        $response = $this->get(route('inquiries.create'));

        $response->assertOk()->assertViewIs('app.inquiries.create');
    }

    /**
     * @test
     */
    public function it_stores_the_inquiry(): void
    {
        $data = Inquiry::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('inquiries.store'), $data);

        $this->assertDatabaseHas('inquiries', $data);

        $inquiry = Inquiry::latest('id')->first();

        $response->assertRedirect(route('inquiries.edit', $inquiry));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_inquiry(): void
    {
        $inquiry = Inquiry::factory()->create();

        $response = $this->get(route('inquiries.show', $inquiry));

        $response
            ->assertOk()
            ->assertViewIs('app.inquiries.show')
            ->assertViewHas('inquiry');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_inquiry(): void
    {
        $inquiry = Inquiry::factory()->create();

        $response = $this->get(route('inquiries.edit', $inquiry));

        $response
            ->assertOk()
            ->assertViewIs('app.inquiries.edit')
            ->assertViewHas('inquiry');
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

        $response = $this->put(route('inquiries.update', $inquiry), $data);

        $data['id'] = $inquiry->id;

        $this->assertDatabaseHas('inquiries', $data);

        $response->assertRedirect(route('inquiries.edit', $inquiry));
    }

    /**
     * @test
     */
    public function it_deletes_the_inquiry(): void
    {
        $inquiry = Inquiry::factory()->create();

        $response = $this->delete(route('inquiries.destroy', $inquiry));

        $response->assertRedirect(route('inquiries.index'));

        $this->assertDeleted($inquiry);
    }
}
