<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'status',
    ];

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
