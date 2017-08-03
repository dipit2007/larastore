<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BaseModel;

class ProductCategory extends BaseModel
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
    protected $fillable = ['name','description','status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
