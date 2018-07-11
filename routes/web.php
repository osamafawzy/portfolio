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

//for admin routes
Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin','AdminController@index')->name('admin.dashboard');
Route::get('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');


//Slider Route
Route::resource('/admin/slider','SliderController');
Route::get('/admin/slider/{id}/delete','SliderController@destroy');

//Service Route
Route::resource('/admin/service','serviceController');
Route::get('/admin/service/{id}/delete','serviceController@destroy');

//Testimonial Route
Route::resource('/admin/testimonial','testimonialController');
Route::get('/admin/testimonial/{id}/delete','testimonialController@destroy');

//FAQ Route
Route::resource('/admin/faq','faqController');
Route::get('/admin/faq/{id}/delete','faqController@destroy');

//Setting Route
Route::get('/admin/setting','settingController@index');
Route::post('/admin/setting','settingController@store');

//PortofolioCategory Route
Route::resource('/admin/portfolio-category','PortofolioCategoryController');
Route::get('/admin/portfolio-category/{id}/delete','PortofolioCategoryController@destroy');

//Portofolio Route
Route::resource('/admin/portfolio','PortofolioController');
Route::get('/admin/portfolio/{id}/delete','PortofolioController@destroy');

//Partner Route
Route::resource('/admin/partner','PartnerController');
Route::get('/admin/partner/{id}/delete','PartnerController@destroy');

//Team Route
Route::resource('/admin/team','TeamController');
Route::get('/admin/team/{id}/delete','TeamController@destroy');


// for test only
Route::get('test/create','AdminController@testCreate');
Route::get('test','AdminController@testIndex');





//Auth::routes();


//for user routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userlogout')->name('user.logout');
