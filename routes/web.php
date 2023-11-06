<?php
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\SsoController;
use Laravel\Socialite\Facades\Socialite;
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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login-page', [SsoController::class, 'viewLoginPage'])->name('l-page');
Route::get('/register-page', [SsoController::class, 'viewRegisterPage']);
// SSO CONTROLLER
Route::middleware(['api'])->group(function() {
Route::post('sso/login', [SsoController::class, 'login'])->name('login');
Route::post('sso/register', [SsoController::class, 'register'])->name('register');
Route::post('sso/logout', [SsoController::class, 'logout'])->middleware('auth:api');
Route::post('sso/logout', [SsoController::class, 'logout']);
});
Route::get('/auth/google',[SsoController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SsoController::class, 'handleGoogleCallback']);
Route::get('/dashboard', [SsoController::class,'index'])->name('dashboard');