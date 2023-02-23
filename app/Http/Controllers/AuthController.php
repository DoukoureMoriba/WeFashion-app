<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(Request $request){
        $request->validate([
            'email' =>['required','email','max:255'],
            'password' =>'required',
        ]);

        //Filtre qui va récupérer que les infos de ces deux champs dans le formulaire

        $credentials = $request->only('email','password');
        if(auth()->attempt($credentials)){
            $user = auth()->user();

            //L'utilisateur a le role admin
            if($user->role === 'admin'){
                return redirect()->route('dashboard');
            }
       } else {
        //retourne des erreurs si un champ est mal renseigné
        return redirect()->back()->withErrors('Les identifiants sont incorrects.');
       }
        
    }
    
}


