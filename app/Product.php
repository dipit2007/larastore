<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\BaseModel;

class Product extends BaseModel
{
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table = 'products';

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
    protected $fillable = ['name','description','product_status_id','product_category_id','product_brand_id'];

    /**
     * All variants that belongs to this product.
     */
    public function variants()
    {
        return $this->hasMany('App\ProductVariant', 'product_id', 'id');
    }

    /**
     * All variants that belongs to this product.
     */
    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'product_id', 'id');
    }
    public function status()
    {
        return $this->hasOne('App\ProductStatus', 'id', 'product_status_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
