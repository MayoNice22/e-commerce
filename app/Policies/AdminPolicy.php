<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function administrasi(User $user){
        return ($user->role == 'Penguasa' 
                ? Response::allow()
                : Response::deny('Only owner can open/use this!'));
    }
}
