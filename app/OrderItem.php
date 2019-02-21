 <?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function productDetail(){
        return $this->belongsTo('App\ProductDetail');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
