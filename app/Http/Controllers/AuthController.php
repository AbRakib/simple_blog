<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    // login template
    public function login() {
        return view( 'auth.login' );
    }

    // register user|admin
    public function register() {
        return view( 'auth.register' );
    }

    // check login access
    public function checklogin( Request $request ) {
        $credentials = $request->only( 'email', 'password' );
        if ( Auth::attempt( $credentials ) ) {
            toastr()->addSuccess( 'Your account has been restored.' );
            return redirect()->route( 'dashboard' );            
        }
        
        toastr()->escapeHtml( false )->addError( 'Your Email & Password Wrong!!!' );
        return redirect()->back();
    }

    // logout user/admin
    public function logout() {
        Auth::logout();
        toastr()->addSuccess( 'Logout Successfully Done!!!' );
        return redirect()->route('login');
    }
}
