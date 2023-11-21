<?php

namespace App\UseCases\Manufacturer;

use App\Models\Manufacturer;
use Illuminate\Support\Facades\Session;

class StoreManufacturer
{
    public static function execute($data)
    {
        $newManufacturer = new Manufacturer($data);
        $newManufacturer->save();

        Session::flash('flash_message',[
			'msg'=>"Marca adicionada com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}