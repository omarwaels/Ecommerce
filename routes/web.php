<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;

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
// Route::group(['middleware'= 'auth'],function(){


// });

Route::get('/login', function () {
    return view('user\login');
})->name('login');
Route::get('/home',function () {
    return view('user\login');
});
Route::post('/home',[user::class , "logInReq"]);


Route::post('/login', [user::class , "addUser"])->name('login');
Route::get('/register', function () {
    return view('user\register');
})->name('register');
