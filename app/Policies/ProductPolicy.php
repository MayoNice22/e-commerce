<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function create(User $user){
        return ($user->role == 'Penguasa'|| $user->role =='Pegawai'
                ? Response::allow() 
                : Response::deny('Only owner or employee can do this!'));
    }
    public function edit(User $user){
        return ($user->role == 'Penguasa'|| $user->role =='Pegawai'
                ? Response::allow() 
                : Response::deny('Only owner or employee can do this!'));
    }
    public function delete(User $user){
        return ($user->role == 'Penguasa'|| $user->role =='Pegawai'
                ? Response::allow() 
                : Response::deny('Only owner or employee can do this!'));
    }
}
