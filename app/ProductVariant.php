<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\BaseModel;

use Amsgames\LaravelShop\Traits\ShopItemTrait;

class ProductVariant extends BaseModel
{
    use SoftDeletes;
    use ShopItemTrait;

    /**
     * Custom field name to define the item's name.
     * @var string
     */
    protected $itemName = 'name';

    /**
     * Name of the route to generate the item url.
     *
     * @var string
     */
    protected $itemRouteName = 'product';

    /**
     * Name of the attributes to be included in the route params.
     *
     * @var string
     */
    protected $itemRouteParams = ['slug'];


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
    						'product_id','sku','price','tax',
    						'shipping', 'currency','quantity',
    						'class', 'reference_id', 
    						'name', 'description',
    						'status',
    						];

    /**
     * Get the Product associated with the ProductVariant.
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    /**
     * Get the Product associated with the ProductVariant.
     */
    public function images()
    {
        return $this->hasMany('App\ProductVariantImage', 'product_variant_id', 'id');
    }

    /**
     * Get the Product associated with the ProductVariant.
     */
    public function specificationandfeatures()
    {
        return $this->hasMany('App\ProductSpecificationFeature', 'product_variant_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}

