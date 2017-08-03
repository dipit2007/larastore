<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BaseModel;

class ProductVariantAttributeValue extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table = 'product_categories';

    /**
     * The database column as primary key used by the model.
     *
     * @var string
     */
    //protected $primarykey = 'id';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'product_sku','product_attribute_id','product_attribute_value_id' ];
}
