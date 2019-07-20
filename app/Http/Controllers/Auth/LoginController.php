<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        if (Auth::user()) {
            return redirect('/admin');
        }

        if (Auth::user()->hasRole('siswa')) {
            return redirect(route('indexPendaftaranSiswa'));
        }

        return redirect(route('logout'));

        // if (Auth::user()->hasRole('siswa')) {
        //     return redirect(route('indexPendaftaranSiswa'));
        // } else if (Auth::user()->hasRole('admin')) {
        //     return redirect(route('indexJurusanKelasAdmin'));
        // } else if (Auth::user()->hasRole('superadmin')) {
        //     return redirect(route('indexAdmin'));
        // } else if (Auth::user()->hasRole('pimpinan')) {
        //     return redirect(route('indexAdmin'));
        // }
        // else {
        //     return redirect(route('logout'));
        // }
    }
}
