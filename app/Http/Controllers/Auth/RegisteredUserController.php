<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan user baru ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login user
        Auth::login($user);

        // Arahkan ke halaman login
        return redirect()->route('login');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'string'],
    //     ]);
    
    //     // Login user
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         // Arahkan ke halaman index setelah login
    //         return redirect()->route('blogs.index');  // Ganti dengan rute yang sesuai jika perlu
    //     }
    
    //     // Jika login gagal, kembali ke halaman login dengan pesan error
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);

    //     Auth::login($user);

    //     return redirect()->route('login'); // Arahkan ke halaman login
    // }  
}
