<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {
    // login template
    public function login() {
        return view('auth.login');
    }

    // register user|admin
    public function register() {
        return view('auth.register');
    }

    // check login access
    public function checklogin(Request $request) {
        
    }
}
