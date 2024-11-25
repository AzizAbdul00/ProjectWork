<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    
    Public function loginProses(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:6'
        ]);
        
        if(Auth::Attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah. Coba lagi');
        }
    }  
    
    Public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    
    
    Public function register() 
    {
        return view('auth.register');
    }
    
    Public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:6'
        ]);
        
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        User::create($data);
        if(Auth::Attempt($user)){
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Register berhasil');
        } else {
            return redirect()->route('register')->with('failed', 'Register gagal Silahkan coba lagi');
        }
    }
    
}