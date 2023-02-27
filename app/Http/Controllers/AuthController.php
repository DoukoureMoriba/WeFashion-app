<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    


    public function register(Request $request){
        $request->validate([
            'name'=>['required','max:255'],
            'email' =>['required','email','max:255'],
            'password' =>'required', 
        ]);

       $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    //Connexion automatique apres la création du compte...
        auth()->login($user); 
        return redirect()->route('all');
}

}


