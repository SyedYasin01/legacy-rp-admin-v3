<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\SteamController;
use Illuminate\Support\Facades\Route;
use kanalumaddela\LaravelSteamLogin\Facades\SteamLogin;

// Grouping of all the authentication methods together.
Route::group([ 'prefix' => 'auth' ], function () {
    // Allow users to login using their steam account.
    // - {host}:{port}/auth/login/steam
    // - {host}:{port}/auth/auth/steam
    SteamLogin::routes(['controller' => SteamController::class]);
});

// Authentication controllers.
Route::group([ 'namespace' => 'Auth' ], function() {
    Route::name('login')->get('/login', 'LoginController');
    Route::name('logout')->post('/logout', 'LogoutController');
});

// Group all of the routes that require authentication and staff permission together.
Route::group([ 'middleware' => [ 'auth', 'staff' ] ], function () {

    // Dashboard.
    Route::name('dashboard')->get('/', 'HomeController');

    // Player resource.
    Route::group([ 'namespace' => 'Player' ], function () {
        Route::resource('players', 'PlayerController');
        Route::resource('players.warnings', 'WarningController');
        Route::resource('players.bans', 'BanController');
    });

    // Character resource.
    Route::resource('characters', 'CharacterController');

    // Log resource.
    Route::resource('logs', 'LogController');

});


