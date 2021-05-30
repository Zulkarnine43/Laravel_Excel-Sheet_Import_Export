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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[
'uses'=>'MyController@index',
'as'=>'home'
]);

Route::get('/Farmer/signup',[
'uses'=>'MyController@signup',
'as'=>'signup_form'
]);

Route::post('/Farmer/signup/save',[
    'uses'=>'MyController@signup_form_save',
    'as'=>'signup_form_save'
]);

Route::get('/Farmers',[
    'uses'=>'MyController@all_farmers',
    'as'=>'all_farmers'
]);

Route::get('/Farmer/deactive/{id}',[
    'uses'=>'MyController@farmer_deactive',
    'as'=>'farmer_deactive'
]);

Route::get('/Farmer/login/page',[
    'uses'=>'MyController@f_login',
    'as'=>'f_login'
]);

Route::post('/Farmer/login/check',[
    'uses'=>'MyController@f_login_check',
    'as'=>'f_login_check'
]);

Route::get('/Farmer/logout',[
    'uses'=>'MyController@f_logout',
    'as'=>'f_logout'
]);

Route::get('/about',[
    'uses'=>'MyController@about',
    'as'=>'about'
]);
Route::post('/add/cart',[
    'uses'=>'MyController@add_cart',
    'as'=>'add_cart'
]);

Route::get('/delete/cart/{id}',[
    'uses'=>'MyController@cart_delete',
    'as'=>'cart_delete'
]);

Route::get('/download/pdf',[
    'uses'=>'MyController@d_pdf',
    'as'=>'d_pdf'
]);







// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

