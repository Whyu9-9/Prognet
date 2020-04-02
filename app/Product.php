<?php

 namespace App;

 use Illuminate\Database\Eloquent\Model;
 class Product extends Model
 {
     protected $fillable = [
     'product_name',
     'price',
     'description',
     'stock',
    ];

    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];
 }