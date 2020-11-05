<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home() {
        return view('home');
    }
    public function login() {
        return view('login');
    }
    public function updatePass() {
        $user = User::find(5);
        $user ->password = Hash::make('1');
        $user->save();
    }
    public function postLoginAdmin(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->to('/admins/products');
        }
       return redirect()->route('login')->with(['mess'=>'a']);
    }

    public function logout(){
        \auth()->logout();
        return redirect()->route('login');
    }
}
