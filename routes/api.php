<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([ 'middleware' => 'api','namespace' => 'Api'], function () {


    ### Auth
    route::post('login','AuthController@login');
    route::post('register','AuthController@register');
    route::post('logout','AuthController@logout');
    route::post('updateProfile','AuthController@updateProfile');
    route::post('deleteMyAccount','AuthController@deleteMyAccount');

    ### Site
    route::post('addPost','SiteController@addPost');
    route::get('posts','SiteController@posts');
    route::get('postTypes','SiteController@postTypes');
    route::POST('deleteMySite','SiteController@deleteMySite');
    route::POST('checkUserView','SiteController@checkUserView');

    ### Points
    route::get('latestPoints','PointController@latestPoints');
    route::get('allPoints','PointController@allPoints');

    ### Setting
    route::get('setting','SettingController@setting');

});


