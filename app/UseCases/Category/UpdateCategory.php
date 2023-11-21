<?php

namespace App\UseCases\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class UpdateCategory
{
    public static function execute($data, Category $category)
    {
        $category->update($data);

        Session::flash('flash_message',[
			'msg'=>"Categoria editada com sucesso!",
			'class'=>"alert-success"
    	]);
    }
}