<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthManualController extends Controller
{
    public function index()
    {
        return view('manual-auth.login');
    }

    public function loginProses(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();
        Alert::success('Selamat!', 'Anda berhasil masuk ke sistem');

        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('homepage');
        } else {
            abort(403, 'Role tidak dikenal.');
        }
    }

    Alert::toast('Username atau Password anda salah', 'error')->autoClose(3000);
    return back();
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::toast('anda berhasil logout', 'success')->autoClose(3000);
        return redirect()->route('homepage');
    }
}
