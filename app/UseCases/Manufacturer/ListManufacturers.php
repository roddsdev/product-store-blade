<?php

namespace App\UseCases\Manufacturer;

use App\Models\Manufacturer;

class ListManufacturers
{
    public static function execute($data)
    {
        $table = Manufacturer::search($data)->paginate(10)->appends($data);

        return $table;
    }
}