<?php

namespace App\UseCases\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class DestroyProduct
{
    public static function execute(Product $product)
    {
        $product->delete();

        Session::flash('flash_message',[
			'msg'=>"Produto deletado com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}