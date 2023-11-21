<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_category_screen_can_be_rendered(): void
    {
        $response = $this->get('/categories/create');

        $response->assertSee(['<div class="collapse navbar-collapse" id="navbarNav">'], false);
        $response->assertStatus(200);
    }

    public function test_create_category(): void
    {
        $data = ['dsCategory' => 'Marca de testes'];
        $response = $this->post('/categories', $data);

        $response->assertRedirect(route('categories.index'));
    }

    public function test_edit_category_screen_can_be_rendered(): void
    {
        Category::factory()->create();      
        $response = $this->get('/categories/1/edit');

        $response->assertSee(['<div class="collapse navbar-collapse" id="navbarNav">'], false);
        $response->assertStatus(200);
    }

    public function test_update_category(): void
    {
        $item = Category::factory()->create();
        $changedItem = ['dsCategory' => 'Este campo foi alterado'];
        $response = $this->put('/categories/1', $changedItem);
        $item->refresh();

        $response->assertRedirect(route('categories.index'));
        $this->assertSame($item->dsCategory, $changedItem['dsCategory']);
    }

    public function test_destroy_category(): void
    {
        $item = Category::factory()->create();
        $response = $this->delete('/categories/1');
        $item->refresh();

        $this->assertNotNull($item->deleted_at);
        $response->assertRedirect(route('categories.index'));
    }
}
