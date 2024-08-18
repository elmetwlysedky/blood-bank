<?php


use App\Http\Controllers\API\AuthController;
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



Route::group(
    [ 'namespace' => 'App\Http\Controllers\Api'],
    function () {
        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');
        Route::post('/send_email_reset', 'AuthController@sendResetLinkEmail');
        Route::post('/reset_password', 'AuthController@reset_password');
        Route::get('/cities', 'CityController@all');
        Route::get('/governorates', 'GovernorateController@all');
        Route::get('/categories', 'CategoryController@all');


        Route::get('/test', 'SettingsController@test');


        Route::group(
            [ 'middleware' => 'auth:sanctum'],
            function () {

                Route::get('/profile/edit', 'AuthController@edit');
                Route::patch('/profile/update', 'AuthController@update');
                Route::post('/logout', 'AuthController@logout');
                Route::get('/posts', 'PostsController@posts');
                Route::post('/post/favorite', 'PostsController@favorite');
                Route::post('/donation_request/create', 'DonationRequestController@create');
                Route::get('/donation_request/all', 'DonationRequestController@all');
                Route::get('/social', 'SettingsController@social');
                Route::get('/about_us', 'SettingsController@about_us');
                Route::post('/setting/notification', 'SettingsController@notification');
                Route::get('/contact_us', 'ContactController@store');





            }
        );
    }
);
