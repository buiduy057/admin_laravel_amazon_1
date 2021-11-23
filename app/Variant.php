<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variants';
    protected $guarded = [];
    public function product()
    {
    	return $this->belongsToMany('App\Product','product_id','id');
    }
}
