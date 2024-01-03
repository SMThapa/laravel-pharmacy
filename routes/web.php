<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


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

//auth
Route::get('login', [AuthController::class, 'login']);
Route::get('forgot_password', [AuthController::class, 'forgot_password']);
Route::post('forgot_password_post', [AuthController::class, 'forgot_password_post']);
Route::get('register', [AuthController::class, 'create_account']);

Route::post('login_post',[AuthController::class, 'login_post']);

//admin section
Route::group(['middleware' => 'admin'],
    function(){
        Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    }
);

Route::get('logout', [AuthController::class, 'logout']);

Route::get('/', function () {
    return view('welcome');
});
