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
    protected $redirectTo = '/blogs';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login', 'showLoginForm'); // Halaman login tidak memerlukan autentikasi
    }
    

   public function login(Request $request)
    {
        // Validasi data login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Jika kredensial valid dan berhasil login
        if (Auth::attempt($credentials)) {
            // Setelah login, arahkan ke halaman utama atau halaman yang diinginkan
            return redirect()->intended(route('blogs.index')); // Menggunakan intended jika ada rute yang belum terakses
        }

        // Jika login gagal, redirect kembali dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    protected function authenticated(Request $request, $user)
{
    return redirect()->route('blogs.index');
}

}
