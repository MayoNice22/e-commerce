<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function brands(){
        return $this->belongsTo('App\Models\Brands','brands_id','id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','categories_id','id');
    }
    public function spec(){
        return $this->hasMany('App\Models\Spec', 'products_id', 'id');
    }

    public function product_transaction(){
        return $this->belongsToMany('App\Models\Transaction','products_transactions','product_id','transaction_id')
        ->withPivot('quantity','subtotal');
    }
}
