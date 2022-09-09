<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(!User::where("email",$request->email)->first()){
            return redirect()->back()->with("gagal","Email tidak ditemukan");
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            switch (auth()->user()->role) {
                case 'admin':
                    return redirect('dashboard');
                    break;
                case 'asosiasi':
                    return redirect('user/konsultasi');
                    break;
                default:
                    return redirect('dashboard');
                    break;
            }
        }

        return redirect()->back()->with("gagal","Password tidak valid");
    }
}
