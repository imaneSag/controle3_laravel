<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class ControllerLogin extends Controller
{
    public function show(){
        return view('Login.login');
    }
    public function login(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('livres.index')->with('success','Vous êtes bien connecté');
        }else{
            return back()->withErrors([
                'email'=>'Email ou mot de pass incorrecte ! '
            ])->onlyInput('input');

        }
    }
    public function logout(){
        FacadesSession::flush();
        Auth::logout();
        return to_route('login');
    }
}
