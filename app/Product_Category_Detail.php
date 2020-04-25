<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Category_Detail extends Model
{
    protected $table='product_category_details';

    protected $fillable = [
        'category_id', 'product_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function category(){
    	return $this->hasMany('App\Category','id','category_id');
    }

    public function product(){
    	return $this->hasMany('App\Product','id','product_id');
    }
}
