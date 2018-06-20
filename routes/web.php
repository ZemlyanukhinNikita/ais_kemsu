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
    //роуты региона
    Route::get('/', 'RegionController@show')->name('regions');
    Route::match(['get', 'post'],'{region_id}/', 'RegionController@showRegion');
    Route::get('{id}/group/{group_id}','RegionController@showIndicators');
    //Роут ресурс для показателей, которые делятся на 16 отраслей (индустрий)
    Route::resource(
        '{id}/group/{group_id}/indicator/{indicator_id}/industries/{industries_id}/industryValues',
        'IndustriesValuesController'
    )->except(['create', 'edit', 'update', 'show']);
    //Роут ресурс для обычных показателей характеристик региона
    Route::resource('{id}/group/{group_id}/indicator/{indicator_id}/values','IndicatorValuesController')
        ->except(['create', 'edit', 'update', 'show']);
    Route::post('{id}/group/{group_id}/indicator/{indicator_id}/values/export','IndicatorValuesController@export')->name('values.export');
});

//роуты отчетов
Route::get('/reports', function () {
    $groupsRepository = \App\Group::all();
    $regionsRepository = \App\Region::all();

    foreach ($regionsRepository as $region)
    {
        $regions[] = $region->region;
    }
    foreach ($groupsRepository as $group)
    {
        $groups[] = $group->name;
    }
    return view('reports',['group' => $groups,'region' => $regions]);
});
Route::post('/reports/export','ReportsController@export')->name('export');

//Кабинет администратора
Route::post('/register/add', 'AdminController@register')->name('registerAdd');
Route::get('register/new', function (){return view('registerForm');})->name('registerForm');

//Роуты регистрации и авторизации
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('new/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('new/register', 'Auth\RegisterController@register')->name('register');
