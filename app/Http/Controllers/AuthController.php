<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard')
            ->with('success', 'Selamat Datang admin');
    } else {
        return redirect()->route('landing')
            ->with('success', 'Selamat Datang user');
    }
}


        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'foto'    => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'alamat'   => 'required|string|max:255',
            'no_telp'  => 'required|string|max:15',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'foto'    => $request->file('foto')->store('users','public'),
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        return redirect()->route('login')->with('success','Registrasi berhasil, silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success','Berhasil keluar.');
    }
}
