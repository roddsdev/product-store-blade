<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'dsProduct',
        'manufacturer_id',
        'price',
        'color',
        'weight'
    ];

    public function scopeSearch($query, $dataSearchArray)
    {
        if (isset($dataSearchArray['buscar'])) {
            $searchValues = preg_split('/\s+/', $dataSearchArray['buscar'], -1, PREG_SPLIT_NO_EMPTY);

            foreach($searchValues as $value) {
                $query = $query->where(function ($q) use ($value) {
                            $q->orWhere('dsProduct', 'like', "%{$value}%");
                            $q->orWhere('price', $value);
                            $q->orWhere('weight', $value);
                            $q->orWhereHas('manufacturer', function($q2) use ($value){
                                $q2->where('dsManufacturer', 'like', "%{$value}%");
                            });
                        });
            }
        }

        return $query;
    }
    
    public function manufacturer()
    {
    	return $this->belongsTo(Manufacturer::class);
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class, 'product_category');;
    }
}
