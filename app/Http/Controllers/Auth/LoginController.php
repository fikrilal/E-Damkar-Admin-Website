<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'username.required' => 'Kolom username wajib diisi',
            'username.string' => 'Kolom username harus berupa teks dan angka',
            'password.required' => 'Kolom password wajib diisi',
            'password.string' => 'Kolom password harus berupa teks dan angka',
            'password.min' => 'Panjang password minimal harus 6 karakter',
        ]);
    
        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
    
        $login = [
            $loginType => $request->username,
            'password' => $request->password
        ];
    
        // if(Auth::attempt($login)){
        //     $request->session()->regenerate();
        //     return redirect()->route('dashboard')->with(['succes' => 'Anda berhasil Login !']);
        // }
    
        // return redirect()->route('login')->with(['error' => 'Username / Password Anda salah !']);
        

        // $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ?'email' : 'username';

        // $login = [
        //     $loginType => $request->username,
        //     'password' => $request->password
        // ];

        if(auth()->attempt($login)){
            return redirect()->route('dashboard')->with(['succes' => 'Anda berhasil Login !']);
        }
        return redirect()->route('login')->with(['error' => 'Username / Password Anda salah !']);
    }
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
    protected $redirectTo = RouteServiceProvider::HOME;

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