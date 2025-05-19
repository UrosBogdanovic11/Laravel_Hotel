<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogInController extends Controller
{
    public function showLoginForm()
    {
        return view('page.login');
    }

    public function login(Request $request)
    {
        // Validacija
        $credentials = $request->validate([
            'Email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Autentifikacija
        if (Auth::attempt(['Email' => $credentials['Email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        // Ako auth nije uspela
        return back()->withErrors([
            'Email' => 'Pogresni kredencijali.',
        ]);
    }

    // Odjava
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
