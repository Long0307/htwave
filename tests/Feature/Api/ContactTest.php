<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Contact;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
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
    public function it_gets_contacts_list(): void
    {
        $contacts = Contact::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.contacts.index'));

        $response->assertOk()->assertSee($contacts[0]->address);
    }

    /**
     * @test
     */
    public function it_stores_the_contact(): void
    {
        $data = Contact::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.contacts.store'), $data);

        unset($data['map']);

        $this->assertDatabaseHas('contacts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_contact(): void
    {
        $contact = Contact::factory()->create();

        $data = [
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->text(255),
            'fax' => $this->faker->text(255),
            'logo1' => $this->faker->text(255),
            'logo2' => $this->faker->text(255),
            'map' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.contacts.update', $contact),
            $data
        );

        unset($data['map']);

        $data['id'] = $contact->id;

        $this->assertDatabaseHas('contacts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_contact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->deleteJson(route('api.contacts.destroy', $contact));

        $this->assertDeleted($contact);

        $response->assertNoContent();
    }
}
