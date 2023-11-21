<?php

namespace App\UseCases\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class StoreCategory
{
    public static function execute($data)
    {
        $newCategory = new Category($data);
        $newCategory->save();

        Session::flash('flash_message',[
			'msg'=>"Categoria adicionada com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}