<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('page.register');
    }


    public function store() 
    {
        $attributes = request()->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Surname' => ['required', 'string', 'max:255'],
            'JMBG' => ['required', 'digits:13', 'unique:users'],
            'Phone' => ['required', 'string', 'max:15'],
            'Email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);
        
    
        // Postavljamo role ručno
        $attributes['role'] = 'User';
    
        // Kreiranje korisnika
        $user = User::create($attributes);

       
    
        // Automatski login
        Auth::login($user);
        return redirect('/home');
    }
    
}
