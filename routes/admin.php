<?php

use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['namespace' => 'App\Http\Controllers\Dashboard',
            'middleware' => ['auth','localize'],
//            'prefix' => LaravelLocalization::setLocale(),

], function () {





        Route::get('/main', function () {
            return view('Dashboard.index');
        })->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('user', 'UserController');

        Route::resource('client', 'ClientController');
        Route::put('client/status/{id}', 'ClientController@active')->name('client.active');
        //    Route::get('client/{id}', 'ClientController@show')->name('client.show');
        //    Route::delete('client/{id}', 'ClientController@destroy')->name('client.destroy');



        Route::resource('category', 'CategoryController');
        Route::resource('post', 'PostController');
        Route::resource('donation_request', 'DonationRequestController');

        Route::get('permissions', 'PermissionController@index')->name('permission.index');
        Route::get('permission/create', 'PermissionController@create')->name('permission.create');
        Route::post('permission/store', 'PermissionController@store')->name('permission.store');

        Route::get('roles', 'RoleController@index')->name('role.index');
        Route::get('role/create', 'RoleController@create')->name('role.create');
        Route::post('role/store', 'RoleController@store')->name('role.store');

        Route::get('user_permission/{id}', 'RoleController@userPermission')->name('user.permission');
        Route::post('add_permission/{id}', 'RoleController@addPermission')->name('add.permission');



});




require __DIR__.'/auth.php';
