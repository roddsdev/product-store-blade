<?php

namespace App\UseCases\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class UpdateProduct
{
    public static function execute($data, Product $product)
    {
        $categories = $data['categories'];
        $product->update($data);
        $product->categories()->detach();        
        $product->categories()->attach($categories);

        Session::flash('flash_message',[
			'msg'=>"Produto editado com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}