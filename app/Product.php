<?php

 namespace App;

 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 class Product extends Model
 {
    use SoftDeletes;

    protected $table = 'products';

     protected $fillable = [
     'product_name',
     'price',
     'description',
     'stock',
     'weight',
    ];

    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];
 }