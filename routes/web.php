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
Auth::routes();

Route::get('/', 'Auth\LoginController@showLogin');
Route::get('login', 'Auth\LoginController@showLogin')->name('login');
// Route::post('login', 'Auth\LoginController@doLogin')->name('login');

Route::group(['middleware' => ['auth:web']], function () {
    //AUTH
    Route::post('logout', 'Auth\LoginController@doLogout');
    Route::get('setpassword/{users}', 'UsersController@showSetpassword');
    Route::post('setpassword/{users}', 'UsersController@setpassword');
    Route::get('resetpassword/{users}', 'UsersController@resetpassword');

    //DASHBOARD
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    //ROLE AND PERMISSION
    Route::resource('roles','RoleController');

    //USERS
    Route::get('/users', 'UsersController@index');
    Route::get('/users/create', 'UsersController@create');
    Route::post('/users', 'UsersController@store');
    Route::get('/users/{id}', 'UsersController@edit');
    Route::put('/users/{users}', 'UsersController@update');
    Route::get('/users/{users}/deactivate', 'UsersController@deactivate');
    Route::get('/users/{users}/reactivate', 'UsersController@reactivate');
});

// Route::group(['middleware' => ['auth:web']], function () {
//     //CUSTOMER SERVICES
//     Route::get('/customer', 'CustomerController@index');
//     Route::get('/customer/create', 'CustomerController@create');
//     Route::post('/customer', 'CustomerController@store');
//     Route::get('/customer/{id}', 'CustomerController@edit');
//     Route::put('/customer/{customer}', 'CustomerController@update');
//     Route::get('/customer/{customer}/deactivate', 'CustomerController@deactivate');
//     Route::get('/customer/{customer}/reactivate', 'CustomerController@reactivate');

//     //AGENT SERVICES
//     Route::get('/agent', 'AgentController@index');
//     Route::get('/agent/create', 'AgentController@create');
//     Route::post('/agent', 'AgentController@store');
//     Route::get('/agent/{id}', 'AgentController@edit');
//     Route::put('/agent/{agent}', 'AgentController@update');
//     Route::get('/agent/{agent}/deactivate', 'AgentController@deactivate');
//     Route::get('/agent/{agent}/reactivate', 'AgentController@reactivate');


//     //CATEGORY CUSTOMER SERVICES
//     Route::get('/categorycustomer', 'CategoryCustomerController@index');
//     Route::get('/categorycustomer/create', 'CategoryCustomerController@create');
//     Route::post('/categorycustomer', 'CategoryCustomerController@store');
//     Route::get('/categorycustomer/{id}', 'CategoryCustomerController@edit');
//     Route::put('/categorycustomer/{categorycustomer}', 'CategoryCustomerController@update');
//     Route::get('/categorycustomer/{categorycustomer}/deactivate', 'CategoryCustomerController@deactivate');
//     Route::get('/categorycustomer/{categorycustomer}/activate', 'CategoryCustomerController@activate');

//     //CATEGORY SUPPLIER SERVICES
//     Route::get('/categorysupplier', 'CategorySupplierController@index');
//     Route::get('/categorysupplier/create', 'CategorySupplierController@create');
//     Route::post('/categorysupplier', 'CategorySupplierController@store');
//     Route::get('/categorysupplier/{id}', 'CategorySupplierController@edit');
//     Route::put('/categorysupplier/{categorysupplier}', 'CategorySupplierController@update');
//     Route::get('/categorysupplier/{categorysupplier}/deactivate', 'CategorySupplierController@deactivate');
//     Route::get('/categorysupplier/{categorysupplier}/activate', 'CategorySupplierController@activate');

//     //CATEGORY ITEMS SERVICES
//     Route::get('/categoryitems', 'CategoryItemsController@index');
//     Route::get('/categoryitems/create', 'CategoryItemsController@create');
//     Route::post('/categoryitems', 'CategoryItemsController@store');
//     Route::get('/categoryitems/{id}', 'CategoryItemsController@edit');
//     Route::put('/categoryitems/{categoryitems}', 'CategoryItemsController@update');
//     Route::get('/categoryitems/{categoryitems}/deactivate', 'CategoryItemsController@deactivate');
//     Route::get('/categoryitems/{categoryitems}/activate', 'CategoryItemsController@activate');

// });
