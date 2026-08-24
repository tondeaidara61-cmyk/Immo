<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'name'=>'required|string|max:255',
                'password'=>'required|string|min:8',
            ],
            [
                
                'required'=>'Ce champ est obligatoire.',
                'name.max'=>'Le nom ne doit pas contenir plus de 255 caractères.',
                'password.min'=>'Le mot de passe doit contenir au moins 8 caractères.',
            ]
        );
    $user = User::where('name', $request->name)->first();

    if (!$user) {
         return back()->withErrors([
            'name' => "Ce login n'existe pas.",
        ])->onlyInput('name');
    }

    if (!Hash::check($request->password , $user->password)) {
         return back()->withErrors([
            'password' => "Le mot de passe est incorrect.",
        ])->onlyInput('name');
    }

     Auth::login($user);

    return redirect()->route('articles.index');
    }


public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Déconnexion réussie.');
}
    
}
