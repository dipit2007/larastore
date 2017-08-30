<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\BaseModel;


class ProductVariantSpecificationFeature extends BaseModel
{
	use SoftDeletes;


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
    protected $fillable = [
    						'product_id','product_sku','product_variant_id',
    						'title', 'description','product_variant_specification_status'
    						];

    /**
     * Get the Product associated with the ProductVariant.
     */
    public function productvariant()
    {
        return $this->belongsTo('App\ProductVariant', 'product_variant_id', 'id');
    }
    /**
     * Get the Product associated with the ProductVariant.
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    /*public function status()
    {
        return $this->hasOne('App\ProductVariantImageStatus', 'id', 'product_variant_image_status_id');
    }*/
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}