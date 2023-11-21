<?php

namespace App\UseCases\Category;

use App\Models\Category;

class ListCategories
{
    public static function execute($data)
    {
        $table = Category::search($data)->paginate(10)->appends($data);

        return $table;
    }
}