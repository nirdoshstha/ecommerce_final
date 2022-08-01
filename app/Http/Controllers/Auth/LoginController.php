<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected function redirectTo(){
    //     if(auth()->user()->user_role=='admin'){
    //         return 'admin';
    //     }
    //     if(auth()->user()->user_role=='vendor'){
    //         return 'vendor';
    //     }
    //     if(auth()->user()->user_role=='clients'){
    //         return 'home';
    //     }

    // }
    protected function authenticated(){
        //Admin Login
        if(auth()->user()->user_role=='admin')
        {
            return redirect('admin')->with('status','Welcome to Dashboard');
        }

        //Vendor Login
        if(auth()->user()->user_role=='vendor')
        {
            return redirect('vendor')->with('status','Welcome to Dashboard');

        }

        //Normal User Login
        if(auth()->user()->user_role=='clients')
        {
            return redirect()->back()->with('status','You are logged in successfully');
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
