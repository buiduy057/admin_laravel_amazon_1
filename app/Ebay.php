<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebay extends Model
{
    protected $table = 'ebays';
    protected $guarded = [];
    public function user()
    {
    	return $this->hasMany('App\User','user_id','id');
    }
    public function policy()
    {
        return $this->hasOne('App\Policy');
    }
    public function product()
    {
        return $this->hasMany('App\Product','ebays_id','id');
    }
}
