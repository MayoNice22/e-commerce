<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'categories_id', 'id');
    }
}
