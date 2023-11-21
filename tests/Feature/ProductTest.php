<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product_screen_can_be_rendered(): void
    {
        $response = $this->get('/products/create');

        $response->assertSee(['<div class="collapse navbar-collapse" id="navbarNav">'], false);
        $response->assertStatus(200);
    }

    public function test_create_product(): void
    {
        Manufacturer::factory()->create();
        Category::factory()->create();
        $data = [
            'dsProduct' => 'Produto teste',
            'manufacturer_id' => '1',
            'price' => '2000',
            'color' => '#F2F2F2',
            'weight' => '2',
            'categories' => [1]
        ];
        $response = $this->post('/products', $data);

        $response->assertRedirect(route('products.index'));
    }

    public function test_deny_create_product_with_unknown_category(): void
    {
        Manufacturer::factory()->create();
        $data = [
            'dsProduct' => 'Produto teste',
            'manufacturer_id' => '1',
            'price' => '2000',
            'color' => '#F2F2F2',
            'weight' => '2',
            'categories' => [30]
        ];
        $response = $this->post('/products', $data);

        $response->assertSessionHasErrors(['categories.*']);
    }

    public function test_deny_create_product_with_unknown_manufacturer(): void
    {
        Category::factory()->count(5)->create();
        $data = [
            'dsProduct' => 'Produto teste',
            'manufacturer_id' => '4',
            'price' => '2000',
            'color' => '#F2F2F2',
            'weight' => '2',
            'categories' => [4]
        ];
        $response = $this->post('/products', $data);

        $response->assertServerError();
    }

    public function test_deny_create_product_with_empty_fields(): void
    {
        $data = [
            'dsProduct' => '',
            'manufacturer_id' => '',
            'price' => '0',
            'color' => '',
            'weight' => '',
            'categories' => []
        ];
        $response = $this->post('/products', $data);

        $response->assertSessionHasErrors(['dsProduct', 'manufacturer_id', 'price', 'color', 'weight','categories']);
    }

    public function test_edit_product_screen_can_be_rendered(): void
    {
        Product::factory()
            ->for(Manufacturer::factory())
            ->has(Category::factory()->count(3))
            ->create();      
        $response = $this->get('/products/1/edit');

        $response->assertSee(['<div class="collapse navbar-collapse" id="navbarNav">'], false);
        $response->assertStatus(200);
    }

    public function test_update_product(): void
    {
        $manufacturer = Manufacturer::factory()->create();
        $categories = Category::factory()->count(3);
        $product = Product::factory()
            ->for($manufacturer)
            ->has($categories)
            ->create();    
        $changedProduct = [
            'dsProduct' => 'Produto teste alterado',
            'manufacturer_id' => '1',
            'price' => 3000.0,
            'color' => '#F2F2F2',
            'weight' => '2',
            'categories' => [1, 3]
        ];
        $response = $this->put('/products/1', $changedProduct);
        $product->refresh();
        $categories->make();

        $response->assertRedirect(route('products.index'));
        $this->assertSame($product->dsProduct, $changedProduct['dsProduct']);
        $this->assertSame($product->price, $changedProduct['price']);
        $this->assertSame($product->manufacturer->dsManufacturer, $manufacturer->dsManufacturer);
        foreach ($categories as $dbCategory) {
            foreach ($product->categories as $productCategory) {
                $this->assertSame($productCategory->dsCategory, $dbCategory->dsCategory);
            }
        }
    }

    public function test_destroy_product(): void
    {
        $product = Product::factory()
            ->for(Manufacturer::factory())
            ->has(Category::factory()->count(2))
            ->create(); 
        $response = $this->delete('/products/1');
        $product->refresh();

        $this->assertNotNull($product->deleted_at);
        $response->assertRedirect(route('products.index'));
    }
}
