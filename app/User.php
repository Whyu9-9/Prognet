<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','profile_image','status', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function product(){
        return $this->belongsToMany('App\Product', 'product_reviews', 'user_id', 'product_id')->withPivot('id');
    }

    public function cart(){
        return $this->hasMany('App\Cart', 'user_id', 'id');
    }

    public function product_cart(){
        return $this->belongsToMany('App\Product', 'carts', 'user_id', 'product_id')->withPivot('id');
    }
}
