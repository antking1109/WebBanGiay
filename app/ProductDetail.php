<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
}
