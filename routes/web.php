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

	//password change
	Route::get('/password-change', 'HomeController@password_change')->name('password.change');
	Route::post('/password-change-success/{id}', 'HomeController@password_change_success')->name('password.change.success');

	// package all route
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

	//country all route
	Route::get('/all-country', 'Master\CountryContrller@allCountry')->name('all.country');
	Route::post('/all-country-show', 'Master\CountryContrller@allCountryShow')->name('all.country.show');
	Route::get('/add-country', 'Master\CountryContrller@addCountry')->name('add.country');
	Route::post('/add-country', 'Master\CountryContrller@insertCountry')->name('insert.country');
	Route::get('/show-country', 'Master\CountryContrller@editCountry')->name('country.show');
	Route::get('/edit-country/{id}', 'Master\CountryContrller@editCountry')->name('country.edit');
	Route::post('/update-country/{id}', 'Master\CountryContrller@updateCountry')->name('country.update');


	//timezone all route
	Route::get('/all-timezone', 'Master\TimezoneController@allTimezone')->name('all.timezone');
	Route::post('/all-timezone-show', 'Master\TimezoneController@allTimezoneShow')->name('all.timezone.show');
	Route::get('/add-timezone', 'Master\TimezoneController@addTimezone')->name('add.timezone');
	Route::post('/add-timezone', 'Master\TimezoneController@saveTimezone')->name('save.timezone');
	Route::get('/edit-timezone/{id}', 'Master\TimezoneController@editTimezone')->name('edit.timezone');
	Route::post('/update-timezone/{id}', 'Master\TimezoneController@updateTimezone')->name('update.timezone');
	Route::post('/delete-timezone/{id}', 'Master\TimezoneController@deleteTimezone')->name('delete.timezone');

	//currency all route
	Route::get('/all-currency', 'Master\CurrencyController@allCurrncy')->name('all.currency');
	Route::post('/all-currency-show', 'Master\CurrencyController@allCurrncyShow')->name('all.currency.show');
	Route::get('/add-currency', 'Master\CurrencyController@addCurrency')->name('add.currency');
	Route::post('/add-currency', 'Master\CurrencyController@saveCurrency')->name('save.currency');
	Route::get('/edit-currency/{id}', 'Master\CurrencyController@editCurrency')->name('edit.currency');
	Route::post('/edit-currency/{id}', 'Master\CurrencyController@updateCurrency')->name('update.currency');

	//business category route
	Route::get('/all-business-category', 'Master\BusinessCategoryController@allBusinessCategory')->name('all.business.category');
	Route::post('/all-business-category-show', 'Master\BusinessCategoryController@allBusinessCategoryShow')->name('all.business.category.show');
	Route::get('/add-business-category', 'Master\BusinessCategoryController@addBusinessCategory')->name('add.business.category');
	Route::post('/add-business-category', 'Master\BusinessCategoryController@saveBusinessCategory')->name('save.business.category');
	Route::get('/edit-business-category/{id}', 'Master\BusinessCategoryController@editBusinessCategory')->name('edit.business.category');
	Route::post('/edit-business-category/{id}', 'Master\BusinessCategoryController@updateBusinessCategory')->name('update.business.category');

	//industry all route
	Route::get('/all-industry', 'Master\IndustryController@allIndustry')->name('all.industry');
	Route::post('/all-industry-show', 'Master\IndustryController@allIndustryShow')->name('all.industry.show');

	Route::get('/add-industry', 'Master\IndustryController@addIndustry')->name('add.industry');
	Route::post('/add-industry', 'Master\IndustryController@saveIndustry')->name('save.industry');
	Route::get('/edit-industry/{id}', 'Master\IndustryController@editIndustry')->name('edit.industry');
	Route::post('/update-industry/{id}', 'Master\IndustryController@updateIndustry')->name('update.industry');

	//feature all route
	Route::get('/all-feature', 'Master\FeatureController@allFeature')->name('all.feature');
	Route::post('/all-feature-show', 'Master\FeatureController@allFeatureShow')->name('all.feature.show');
	Route::get('/add-feature', 'Master\FeatureController@addFeature')->name('add.feature');
	Route::post('/add-feature', 'Master\FeatureController@saveFeature')->name('save.feature');

	Route::get('/edit-feature/{id}', 'Master\FeatureController@editFeature')->name('edit.feature');
	Route::post('/update-feature/{id}', 'Master\FeatureController@updateFeature')->name('update.feature');

	//Language all route
	Route::get('/all-language', 'Master\LanguageController@allLanguage')->name('all.language');
	Route::post('/all-language-show', 'Master\LanguageController@allLanguageShow')->name('all.language.show');
	Route::get('/add-language', 'Master\LanguageController@addLanguage')->name('add.language');
	Route::post('/add-language', 'Master\LanguageController@saveLanguage')->name('save.language');
	Route::get('/edit-language/{id}', 'Master\LanguageController@editLanguage')->name('edit.language');
	Route::post('/update-language/{id}', 'Master\LanguageController@updateLanguage')->name('update.language');

});








