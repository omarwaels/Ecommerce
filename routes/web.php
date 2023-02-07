<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\products;

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
    return view('products\home');
});
Route::get('user/profile',function () {
    return view('user\profile');
});
Route::get('products',function () {
    return view('products\home');
});

Route::get('/products/product',[products::class , "prodInfo"]);
Route::post('/home',[user::class , "logInReq"]);

Route::get('/dashboard',[user::class , "tableOfUsers"]);
Route::get('user/cart',[user::class , "showCart"]);



Route::post('/login', [user::class , "addUser"])->name('login');
Route::get('/logout', [user::class , "logout"]);
Route::get('/RankUp', [user::class , "RankUp"]);
Route::get('/RankDown', [user::class , "RankDown"]);
Route::get('/Remove', [user::class , "Remove"]);
Route::get('/register', function () {
    return view('user\register');
})->name('register');
