<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // return redirect(RouteServiceProvider::HOME);
            $role = Auth::user()->role;
            if($role == 'Member'){
                return '/';
            }else if($role =='Pegawai'){
                return '/admin/product';
            }else if($role == 'Penguasa'){
                return '/administrasi';
            }else{
                return '/';
            }
        }

        return $next($request);
    }
}
