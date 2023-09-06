<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get( '/', function () {
    return view( 'welcome' );
} );
Route::get( '/login', [AuthController::class, 'login'] )->name( 'login' );
Route::get( '/register', [AuthController::class, 'register'] )->name( 'register' );
Route::post( '/check-login', [AuthController::class, 'checklogin'] )->name( 'checklogin' );

Route::middleware( 'auth' )->group( function () {

    Route::get( '/dashboard', function () {
        return view( 'admin.app' );
    } )->name( 'dashboard' );

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

} );
