<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function index()
    {
    	return view('auth.login');
    }

    public function do_login(Request $request)
    {
    	if (auth()->attempt($request->only('email','password'))) {
    		return redirect()->route('admin');
    	} else {
    		Session::flash('success','Username Atau Password Salah');
            return redirect()->route('admin.login');
    	}
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/ed-admin');
    }
}
