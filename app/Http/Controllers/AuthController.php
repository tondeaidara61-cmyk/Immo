<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'name'=>'required|string|max:255|unique:users,name',
                'password'=>'required|string|min:8',
            ],
            [
                'required'=>'Ce champ est obligatoire !',
                'name.max'=>'Le nom ne doit pas contenir plus de 255 caractères !',
                'password.min'=>'Le mot de passe doit contenir au moins 8 caractères',
            ]
        );

        if (Auth::attempt($validation)){
            $request ->session()->regenerate();

        return redirect()->route('')->with('success','Connexion reussi');
        }

        return to_route('login')->withErrors(
            [
                'name'=>"Nom ou mot de passe invalide !"
            ]
        )->onlyInput('name');
    }
}
