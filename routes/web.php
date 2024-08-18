<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['namespace' => 'App\Http\Controllers\Site',
              'prefix' => LaravelLocalization::setLocale()

], function () {

    Route::get('/login', 'AuthController@get_login')->name('get.site.login');
    Route::get('register', 'AuthController@create')->name('get.site.register');
    Route::post('/register', 'AuthController@register')->name('site.register');
    Route::post('/login', 'AuthController@login')->name('site.login');
    Route::get('/home', 'HomeController@index')->name('site.home');


    Route::group(
        [ 'middleware' => 'auth:site'],
        function () {

            Route::get('logout', 'AuthController@logout')->name('site.logout');

            Route::get('/contact_us', 'ContactController@create')->name('get.site.contact');
            Route::post('/contact_us', 'ContactController@store')->name('site.contact');

            Route::get('/donation_requests', 'DonationRequestController@index')->name('site.donation.index');

            Route::get('/donation_request/{id}', 'DonationRequestController@show')->name('site.donation.show');

            Route::get('/donation_request/create', 'DonationRequestController@create')->name('site.donation.create');

            Route::post('donation_request/store', 'DonationRequestController@store')->name('site.donation.store');

            Route::get('posts', 'PostController@index')->name('site.posts.index');
            Route::get('post/favorite/{id}', 'Postcontroller@favorite')->name('site.post.favorite');

            Route::get('who_are_we', function () {
                return view('Site.who_are_we');
            })->name('who_are_we');

            Route::get('about', function () {
                return view('Site.about');
            })->name('about');
        }
    );

});
