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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Frontend\HomeController@index')->name('index');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// Admin Routes

Route::group(['prefix' => 'admin'] , function(){
	Route::get('/' , 'Backend\DashboardController@index')->name('admin.dashboard');
	Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
	Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
	Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
	Route::resource('suppliers', 'Backend\SuppliersController', ['names' => 'admin.suppliers']);
	Route::resource('customers', 'Backend\CustomersController', ['names' => 'admin.customers']);
	Route::resource('units', 'Backend\UnitsController', ['names' => 'admin.units']);
	Route::resource('categories', 'Backend\CategoriesController', ['names' => 'admin.categories']);
	Route::resource('products', 'Backend\ProductsController', ['names' => 'admin.products']);
   
	// purchase controller
	Route::prefix('purchase')->group(function(){
		Route::get('/view' ,'Backend\PurchasesController@index')->name('admin.purchases.index');
		Route::get('/create' ,'Backend\PurchasesController@create')->name('admin.purchases.create');
		Route::post('/store' ,'Backend\PurchasesController@store')->name('admin.purchases.store');
		Route::get('/pending' ,'Backend\PurchasesController@pendingList')->name('admin.purchases.pending.list');
		Route::post('/update/{id}' ,'Backend\PurchasesController@update')->name('admin.purchases.update');
		Route::post('/delete/{id}' ,'Backend\PurchasesController@destroy')->name('admin.purchases.destroy');
		Route::post('/approve/{id}' ,'Backend\PurchasesController@approve')->name('admin.purchases.approve');
	});
	// purchase controller

	// Invoice controller
	Route::prefix('invoice')->group(function(){
		Route::get('/view' ,'Backend\InvoiceController@index')->name('admin.invoices.index');
		Route::get('/create' ,'Backend\InvoiceController@create')->name('admin.invoices.create');
		Route::post('/store' ,'Backend\InvoiceController@store')->name('admin.invoices.store');
		Route::get('/pending' ,'Backend\InvoiceController@pendingList')->name('admin.invoices.pending.list');
		Route::post('/update/{id}' ,'Backend\InvoiceController@update')->name('admin.invoices.update');
		Route::post('/delete/{id}' ,'Backend\InvoiceController@destroy')->name('admin.invoices.destroy');
		Route::post('/approve/{id}' ,'Backend\InvoiceController@approve')->name('admin.invoices.approve');
	});
	// Invoice controller

	//	get ajax data 	
	Route::get('/get-category' , 'Backend\DefaultController@getCategory')->name('get-category');
	Route::get('/get-product' , 'Backend\DefaultController@getProduct')->name('get-product');	
	Route::get('/get-product-stock' , 'Backend\DefaultController@getProductStock')->name('check-product-stock');	
	
	
	// Login routes
	Route::get('/login' , 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit' , 'Backend\Auth\LoginController@login')->name('admin.login.submit');
		

	//Logout Routes
	Route::post('/logout/submit' , 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');


	// Forget pssword Routes
	Route::get('/password/reset' , 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset/submit' , 'Backend\Auth\ForgotPasswordController@reset')->name('admin.password.update');
});

