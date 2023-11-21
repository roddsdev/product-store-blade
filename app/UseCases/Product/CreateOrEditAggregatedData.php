<?php

namespace App\UseCases\Product;

use App\Models\Category;
use App\Models\Manufacturer;

class CreateOrEditAggregatedData
{
    public static function get()
    {
        $table['manufacturers'] = Manufacturer::all();

        $table['categories'] = Category::all();

        return $table;
    }
}