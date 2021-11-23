<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboards';
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
