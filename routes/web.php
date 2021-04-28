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

Route::get('/', function () {
    return view('welcome');
});

Route::get("signup","Auth\RegisterContoroller@showRegistrationForm")->name("signup.get");
Route::post("signup","Auth\RegisterContoroller@register")->name("signup.post");

Route::get("login","Auth\LoginContorller@showLoginForm")->name("login");
Route::post("login","Auth\LoginContoroller@login")->name("login.post");
Route::get("logout","Auth\LoginContoroller@logout")->name("logout.get");