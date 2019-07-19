<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return redirect('login');
        
        $user = Auth::user();

        if ($user->hasRole('superadmin')) {
            return $next($request);
        }

        if ($user->hasRole('pimpinan')) {
            return $next($request);
        }

        foreach ($roles as $role) {
            if($user->hasRole($role))
                return $next($request);
        }
        // if (! $request->user()->hasRole($role)) {
        //     if (Auth::user()->hasRole('siswa')) {
        //         return redirect(route('indexPendaftaranSiswa'));
        //     } else if (Auth::user()->hasRole('admin')) {
        //         return redirect(route('indexJurusanKelasAdmin'));
        //     } else {
        //         return redirect(route('logout'));
        //     }
        // }
        return $next($request);
    }
}
