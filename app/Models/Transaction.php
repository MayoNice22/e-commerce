<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    public function pembeli(){
        return $this->belongsTo('App\User','pembeli_id');
    }

    public function pegawai(){
        return $this->belongsTo('App\User','kasir_id');
    }

    public function products(){
        return $this->belongsToMany('App\Models\Product','products_transactions','transaction_id','product_id')
        ->withPivot('quantity','subtotal', 'created_at', 'updated_at');
    }

    public function userTransaction(){
        return $this->belongsToMany('App\Models\Transaction','products_transactions','transaction_id','product_id')
        ->withPivot('quantity','subtotal', 'created_at', 'updated_at');
    }

    public function insertProduct($cart, $user){
        $total = 0;
        foreach($cart as $id => $detail){
            $total += $detail['price'] * $detail['quantity'];
            $this->products()->attach($id,[
                'quantity' => $detail['quantity'], 
                'subtotal' => $detail['price'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
        return $total;
    }
}
