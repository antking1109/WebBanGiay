<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function productType(){
        return $this->belongsTo('App\ProductType');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    public function productDetails(){
        return $this->hasMany('App\ProductDetail');
    }
}
