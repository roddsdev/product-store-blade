<?php

namespace App\UseCases\Product;

use App\Models\Product;

class ListProducts
{
    public static function execute($data)
    {
        $table = Product::search($data)->paginate(10)->appends($data);

        return $table;
    }
}