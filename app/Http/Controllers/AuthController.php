<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create(){
        return inertia('Auth/Login');

    }

    public function store(Request $request){
        if(Auth::attempt($request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]), true)){

            $request->session()->regenerate(); //regenerate session for security
            return redirect()->route('leads.index');
        }else{
            throw ValidationException::withMessages([
                'email'=> 'Authentication failed'
            ]);
        }
    }

    public function destroy(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }

}
