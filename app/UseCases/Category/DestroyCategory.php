<?php

namespace App\UseCases\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class DestroyCategory
{
    public static function execute(Category $category)
    {
        if ($category->loadCount('products')->products_count) {
            return  Session::flash('flash_message',[
                'msg'=>"Categoria $category->dsCategory não pode ser deletada pois ainda existem produtos associados.",
                'class'=>"alert-warning"
            ]);
        }

        $category->delete();

        Session::flash('flash_message',[
			'msg'=>"Categoria deletada com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}