<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Amsgames\LaravelShop\Models\ShopOrderModel;

class ShopOrder extends ShopOrderModel
{
    //
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
