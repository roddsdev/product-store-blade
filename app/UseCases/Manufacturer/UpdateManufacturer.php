<?php

namespace App\UseCases\Manufacturer;

use App\Models\Manufacturer;
use Illuminate\Support\Facades\Session;

class UpdateManufacturer
{
    public static function execute($data, Manufacturer $manufacturer)
    {
        $manufacturer->update($data);

        Session::flash('flash_message',[
			'msg'=>"Marca editada com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}