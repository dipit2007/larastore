<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BaseModel;

class ProductAttribute extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table = 'product_attributes';

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
    protected $fillable = ['product_id','name','description','status'];

    /**
     * All variants that belongs to this product.
     */
    public function attributevalues()
    {
        return $this->hasMany('App\ProductAttributeValue', 'product_attribute_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
