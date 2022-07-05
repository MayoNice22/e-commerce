<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','banned_till'
    ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pembeli()
    {
        return $this->hasMany('App\Models\Transaction', 'pembeli_id', 'id');
    }

    public function transaction(){
        return $this->belongsToMany('App\Models\Transaction','transactions','pembeli_id','kasir_id',)
        ->withPivot('transaction_date','created_at','updated_at');
    }
}
