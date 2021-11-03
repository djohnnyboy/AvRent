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

Route::resource('/', 'FrontController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {  
    Route::resource('carros', 'CarroController');
    Route::resource('bookings', 'BookingController');
    Route::resource('messages', 'MessageController');
    Route::resource('settings', 'SettingController');
    Route::resource('companies', 'CompanyController');
    Route::resource('blog','BlogController');
});

Route::middleware(['web'])->group(function () { 
    
    Route::resource('booking', 'QuoteController');
    Route::resource('/booking-form', 'ReservaController');
    Route::resource('rent-a-car-fleet','FleetController');
    Route::resource('contacts','ContactController');
    Route::resource('payment', 'PaymentController');
    Route::post('ReservaController/fetch','ReservaController@fetch')
            ->name('ReservaController.fetch');
    Route::resource('tours', 'TourBlogController');
    Route::post('PaymentController/paymentIdServerSide','PaymentController@paymentIdServerSide')
            ->name('PaymentController.paymentIdServerSide');
});

