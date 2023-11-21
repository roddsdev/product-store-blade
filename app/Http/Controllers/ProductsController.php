<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\UseCases\Product\CreateOrEditAggregatedData;
use App\UseCases\Product\DestroyProduct;
use App\UseCases\Product\ListProducts;
use App\UseCases\Product\StoreProduct;
use App\UseCases\Product\UpdateProduct;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $table = ListProducts::execute($request->all());

        return view('products.indexProducts', compact('table'));
    }

    public function create()
    {
        $aggregateData = CreateOrEditAggregatedData::get();

        return view('products.createProducts')->with($aggregateData);
    }

    public function store(StoreProductsRequest $request)
    {
        StoreProduct::execute($request->all());

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.showProducts', compact('product'));
    }

    public function edit(Product $product)
    {
        $aggregateData = CreateOrEditAggregatedData::get();
        
        return view('products.editProducts', compact('product'))->with($aggregateData);
    }

    public function update(UpdateProductsRequest $request, Product $product)
    {
        UpdateProduct::execute($request->all(), $product);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        DestroyProduct::execute($product);

        return redirect()->route('products.index');
    }
}
