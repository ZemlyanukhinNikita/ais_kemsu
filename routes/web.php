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
    return redirect('regions');
});
Route::prefix('regions')->group(function () {
    Route::get('/', 'RegionController@show');
    Route::match(['get', 'post'],'{region_id}', 'RegionController@showRegion');
    Route::get('{region_id}/industries', 'IndustryController@show');
    Route::match(['get','post'],'{region_id}/{column}', ['as' => 'generalCharacteristic', 'uses' => 'GeneralCharacteristicsController@show']);
    Route::match(['get', 'post'],'{region_id}/industries/{industry_id}', 'SpecificWeightController@show');

    Route::put('{region_id}/create', 'GeneralCharacteristicsController@createOrUpdate')->name('create');
    Route::put('{region_id}/delete/{year}', 'GeneralCharacteristicsController@delete')->name('delete');

    Route::put('{region_id}/industries/{industry_id}/create', 'SpecificWeightController@createOrUpdate')->name('createWeight');
    Route::put('{region_id}/industries/{industry_id}/delete/{year}', 'SpecificWeightController@delete')->name('deleteWeight');
});
//Route::post('/regions/{region_id}/weight/{industry_id}', ['as'=>'firstGroup1','uses' =>'GeneralCharacteristicsController@showIndexIndustries']);
//Route::get('/regions/{region_id}/{id}/new', 'GeneralCharacteristicsController@create');

//Роуты регистрации и авторизации
//Route::get('/logout', function (){
//    Auth::logout();
//    return redirect()->back();
//});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('new/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('new/register', 'Auth\RegisterController@register')->name('register');
