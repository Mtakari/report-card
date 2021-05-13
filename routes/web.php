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

Route::get("signup","Auth\RegisterController@showRegistrationForm")->name("signup.get");
Route::post("signup","Auth\RegisterController@register")->name("signup.post");
Route::get("login","Auth\LoginController@showLoginForm")->name("login");
Route::post("login","Auth\LoginController@login")->name("login.post");
Route::get("logout","Auth\LoginController@logout")->name("logout.get");


Route::group(["middleware"=>["auth"]],function(){
    //Route::group(["prefix"=>["menus/{id}"]],function(){
        //Route::resource("users","UsersController");
        //Route::get("proceeds/{id}","MenusProceedsController@index")->name("proceeds.index");
        //Route::get("menuus/{proceed}/create","ProceedsController@create")->name("proceeds.create");
        //Route::post("menus/{proceeds}/store","ProceedsController@store")->name("proceeds.store");
        //Route::get("menus/{proceed}", 'ProceedsController@show')->name("proceeds.show");
        //Route::get("menus/{proceed}/edit","ProceedsController@edit")->name("proceeds.edit");
        //Route::put("menus/{proceed}","ProceedsController@update")->name("proceeds.update");
        //Route::delete("menus/{proceed}","ProceedsController@destroy")->name("proceeds.destroy"); 
    //});
        Route::resource("users","UsersController");
        //Route::resource("menus","MenusController");
});