<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use SoftDeletes;
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'brands_id', 'id');
    }
}
