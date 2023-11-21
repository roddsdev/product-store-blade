<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'dsCategory'
    ];

    public function scopeSearch($query, $dataSearchArray)
    {
        if (isset($dataSearchArray['buscar'])) {
            $searchValues = preg_split('/\s+/', $dataSearchArray['buscar'], -1, PREG_SPLIT_NO_EMPTY);

            foreach($searchValues as $value) {
                $query = $query->where(function ($q) use ($value) {
                            $q->orWhere('dsCategory', 'like', "%{$value}%");
                        });
            }
        }

        return $query;
    }

    public function products()
    {
    	return $this->belongsToMany(Product::class, 'product_category');
    }
}
