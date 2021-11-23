<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    protected $table = 'templates';
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
