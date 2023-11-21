<?php

namespace Tests\Feature;

use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_manufacturer_screen_can_be_rendered(): void
    {
        $response = $this->get('/manufacturers/create');

        $response->assertSee(['<div class="collapse navbar-collapse" id="navbarNav">'], false);
        $response->assertStatus(200);
    }

    public function test_create_manufacturer(): void
    {
        $data = ['dsManufacturer' => 'Marca de testes'];
        $response = $this->post('/manufacturers', $data);

        $response->assertRedirect(route('manufacturers.index'));
    }

    public function test_edit_manufacturer_screen_can_be_rendered(): void
    {
        Manufacturer::factory()->create();      
        $response = $this->get('/manufacturers/1/edit');

        $response->assertSee(['<div class="collapse navbar-collapse" id="navbarNav">'], false);
        $response->assertStatus(200);
    }

    public function test_update_manufacturer(): void
    {
        $item = Manufacturer::factory()->create();
        $changedItem = ['dsManufacturer' => 'Este campo foi alterado'];
        $response = $this->put('/manufacturers/1', $changedItem);
        $item->refresh();

        $response->assertRedirect(route('manufacturers.index'));
        $this->assertSame($item->dsManufacturer, $changedItem['dsManufacturer']);
    }

    public function test_destroy_manufacturer(): void
    {
        $item = Manufacturer::factory()->create();
        $response = $this->delete('/manufacturers/1');
        $item->refresh();

        $this->assertNotNull($item->deleted_at);
        $response->assertRedirect(route('manufacturers.index'));
    }
}
