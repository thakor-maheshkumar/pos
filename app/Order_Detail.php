<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    //
    protected $table='order_details';
    protected $guarded =[];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function orders()
    {
        return $this->belongsTo('App\Order');
    }
}
