<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BaseModel;

class ProductStatus extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table = 'product_statuses';

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
    protected $fillable = ['name', 'code', 'description'];
}