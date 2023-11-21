<?php

namespace App\UseCases\Manufacturer;

use App\Models\Manufacturer;
use Illuminate\Support\Facades\Session;

class DestroyManufacturer
{
    public static function execute(Manufacturer $manufacturer)
    {
        if ($manufacturer->loadCount('products')->products_count) {
            return  Session::flash('flash_message',[
                'msg'=>"Marca $manufacturer->dsManufacturer não pode ser deletada pois ainda existem produtos associados.",
                'class'=>"alert-warning"
            ]);
        }

        $manufacturer->delete();

        Session::flash('flash_message',[
			'msg'=>"Marca deletada com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}