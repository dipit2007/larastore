<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

abstract class BaseModel extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function($modelobj)
                {
                $modelobj->created_by = Auth::check()?Auth::user()->id:0;
                $modelobj->updated_by = Auth::check()?Auth::user()->id:0;
                $modelobj->created_at_ip = Request::ip();
                $modelobj->updated_at_ip = Request::ip();
                });

        static::updating(function($modelobj)
                {
                $modelobj->updated_by = Auth::check()?Auth::user()->id:0;
                $modelobj->updated_at_ip = Request::ip();
                });
    }
}
