<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FullTextSearch;
class Category extends Model
{
    use FullTextSearch;
    protected $table = 'categories';
    protected $guarded = [];
    protected $searchable = [
        'slug'
    ];
}
