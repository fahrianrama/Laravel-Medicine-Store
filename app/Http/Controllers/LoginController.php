<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    //login
    public function login()
    {
        return view('login.index');
    }
    // register
    public function register()
    {
        return view('login.register');
    }
    // action login
    public function auth(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            // set session
            Session::put('username', $request->input('username'));
            Session::put('role', Auth::user()->role);
            return redirect('/landing')->with('success', 'Login Success, Welcome '.Auth::user()->username.'!');
        }else{
            return redirect('/login')->withErrors(['Username or Password is incorrect']);
        }
    }
    // action register
    public function registeraction(Request $request)
    {
        if (!$request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
            'name' => 'required',
            'gender' => 'required',
            'location' => 'required',
        ])) {
            return redirect('/register')->withErrors($request->validator);
        }
        $data = [
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'location' => $request->input('location'),
            'role' => 'customer',
        ];
        $user = User::create($data);
        return redirect('/login')->with('success', "Hooray, anda berhasil register!");
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/landing')->with('success', 'Logout Success, See you again!');
    }
}
