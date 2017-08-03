<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Amsgames\LaravelShop\Models\ShopItemModel;

class ShopItem extends ShopItemModel
{
    
    public function getSubtotalAttribute()
    {
    	return $this->price * $this->quantity;
    }
    public function getTotalShippingAttribute()
    {
    	return $this->shipping * $this->quantity;
    }
    public function getTotalTaxAttribute()
    {
    	return $this->tax * $this->quantity;
    }
}

