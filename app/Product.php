<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    public function variant()
    {
    	return $this->hasMany('App\Variant');
    }
    public function ebay()
    {
    	return $this->belongsTo('App\Ebay','ebays_id','id');
    }
}
