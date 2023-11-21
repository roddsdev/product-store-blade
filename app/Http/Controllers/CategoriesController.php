<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\UseCases\Category\DestroyCategory;
use App\UseCases\Category\ListCategories;
use App\UseCases\Category\StoreCategory;
use App\UseCases\Category\UpdateCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $table = ListCategories::execute($request->all());

        return view('categories.indexCategories', compact('table'));
    }

    public function create()
    {
        return view('categories.createCategories');
    }

    public function store(StoreCategoryRequest $request)
    {
        StoreCategory::execute($request->all());

        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('categories.showCategories', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.editCategories', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        UpdateCategory::execute($request->all(), $category);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        DestroyCategory::execute($category);

        return redirect()->route('categories.index');
    }
}
