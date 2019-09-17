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

Auth::routes();


Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@testfunction')->name('test');


Route::group(['middleware' => ['auth']], function(){
	Route::get('/all-packages', 'Master\PackageController@allPackages')->name('all-packages');
	Route::get('/package-json-data', 'Master\PackageController@allposts')->name('package.json.data');


	Route::get('/CheckallPackages', 'Master\PackageController@CheckallPackages');


	Route::post('/allposts', 'Master\PackageController@allposts')->name('all.posts');
	Route::get('/package-show/{id}', 'Master\PackageController@showPackage')->name('package.show');
	Route::get('/package-edit/{id}', 'Master\PackageController@editPackage')->name('package.edit');
	Route::post('/package-update/{id}', 'Master\PackageController@updatePackage')->name('package.update');

	Route::get('/modal-data', 'Master\PackageController@modalData')->name('modal.data');
	Route::get('/modal-data-check', 'Master\PackageController@modalDataCheck')->name('modal.data.check');

	Route::post('/package-add-new', 'Master\PackageController@packageAddNew')->name('package.new.add');
});








