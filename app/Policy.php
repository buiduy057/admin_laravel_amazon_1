<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table = 'policys';
    protected $guarded = [];
    public function ebay()
    {
        return $this->hasOne('App\Ebay');
    }
}
