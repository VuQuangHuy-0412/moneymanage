<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing_page.landing_page');
})->name('landing_page');

//register
Route::get('/register', 'RegisterController@register')->name('register');
Route::post('/register/store', 'RegisterController@store')->name('register.store');

//login
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login/check', 'LoginController@check')->name('login.check');

//password recovery
Route::get('/password', 'PasswordController@password')->name('password');
Route::post('/password/get_password', 'PasswordController@get_password')->name('password.get_password');

//logout
Route::get('/logout', 'LoginController@logout')->name('logout');

//admin
Route::get('/admin', 'Admin\AdminController@admin')->name('admin');

//app
Route::get('/home', 'App\HomeController@home')->name('app.home');
Route::get('/about', function () {
    return view('app.about');
})->name('app.about');

Route::get('/info', 'App\UserController@info')->name('app.info');
Route::get('/info/edit', 'App\UserController@edit_info')->name('app.info.edit');
Route::post('/info/store', 'App\UserController@store_info')->name('app.info.store');

Route::get('/change-password', 'App\UserController@change_password')->name('app.change-password');
Route::post('/save-password', 'App\UserController@save_password')->name('app.save-password');

Route::get('/inactive-user', 'App\UserController@inactive_user')->name('app.inactive-user');
Route::post('/inactive-user-store', 'App\UserController@inactive_user_store')->name('app.inactive-user-store');

Route::get('/category', 'App\CategoryController@category')->name('app.category');
Route::get('/category-in', 'App\CategoryController@category_in')->name('app.category-in');
Route::get('/add-category-in', 'App\CategoryController@add_category_in')->name('app.add-category-in');
Route::post('/store-category-in', 'App\CategoryController@store_category_in')->name('app.store-category-in');
Route::get('/edit-category-in', 'App\CategoryController@edit_category_in')->name('app.edit-category-in');
Route::post('/restore-category-in', 'App\CategoryController@restore_category_in')->name('app.restore-category-in');
Route::get('/category-out', 'App\CategoryController@category_out')->name('app.category-out');
Route::get('/add-category-out', 'App\CategoryController@add_category_out')->name('app.add-category-out');
Route::post('/store-category-out', 'App\CategoryController@store_category_out')->name('app.store-category-out');
Route::get('/edit-category-out', 'App\CategoryController@edit_category_out')->name('app.edit-category-out');
Route::post('/restore-category-out', 'App\CategoryController@restore_category_out')->name('app.restore-category-out');

Route::get('/activity', 'App\ActivityController@activity')->name('app.activity');

Route::get('/report', 'App\ReportController@report')->name('app.report');
