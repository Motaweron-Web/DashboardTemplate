<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/', 'Site\HomeController@index')->name('/');

############# User Auth ##################
    Route::get('register', 'Site\AuthController@register')->name('register');
    Route::POST('UserRegistration', 'Site\AuthController@UserRegistration')->name('UserRegistration');
    Route::get('login', 'Site\AuthController@login')->name('login');
    Route::post('postLogin', 'Site\AuthController@postLogin')->name('postLogin');

    Route::group(['middleware' => 'auth:user', 'namespace' => 'Site'], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('profile', 'AuthController@profile')->name('profile');
        Route::post('edit/myProfile','AuthController@editProfile')->name('admin.edit.myProfile');
        Route::post('edit/myPassword','AuthController@editPassword')->name('admin.edit.myPassword');
        Route::get('delete/myProfile','AuthController@deleteMyProfile')->name('admin.deleteMyProfile');


        });





        ##### Payment ####
        Route::get('checkPay', 'HomeController@checkPay')->name('checkPay');
        Route::get('pointsPrices/{id}', 'HomeController@pointsPrices')->name('pointsPrices');



});


##### No Need To Lang
Route::post('checkUserView', 'Site\FacebookController@checkUserView')->name('checkUserView');


