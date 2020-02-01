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

Route::get('/', 'PagesController@index');
Route::get('/speech', 'PagesController@speech');

//CategoriesControllers
Route::resource('category', 'CategoriesControllerCR')->only([
    'index', 'show','create', 'store'
]);

Route::resource('category', 'CategoriesControllerUD')->only([
    'edit','update', 'destroy'
]);

Route::put('category/{category}/{type}','CategoriesControllerCR@hideCategory')->name('category.hide');

//SubcategoriesControllers
Route::resource('subcategory', 'SubcategoriesControllerCR', ['except' => 'create']);
Route::get('subcategory/{id}/create', 'SubcategoriesControllerCR@create')->name('subcategory.create');
Route::put('subcategory/{subcategory}/{type}','SubcategoriesControllerCR@hideCategory')->name('subcategory.hide');

Route::resource('subcategory', 'SubcategoriesControllerUD')->only([
    'edit','update', 'destroy'
]);

//SetsControllers
Route::resource('set', 'SetsControllerREAD', ['except' => 'create']);
Route::post('set/create', ['uses'=>'SetsControllerCREATE@create','as'=>'id'])->name('set.create');
Route::put('set/{category}/{type}','SetsControllerREAD@hideCategory')->name('set.hide');

Route::resource('set', 'SetsControllerCREATE')->only([
    'store'
]);

Route::resource('set', 'SetsControllerDELETE')->only([
    'destroy'
]);

Route::resource('set', 'SetsControllerUPDATE')->only([
    'edit','update'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('adminpanel', 'AdminPanelsController', ['except' => ['create', 'store']]);
Route::resource('auth', 'AuthorizationsController', ['except' => ['create', 'edit', 'update']]);
Route::post('auth/create', ['uses'=>'AuthorizationsController@create','as'=>'id'])->name('auth.create');
Route::post('set/learn', ['uses'=>'LearnController@mode1','as'=>'mode_id'])->name('mode');
Route::post('set/learn', ['uses'=>'LearnController@mode2','as'=>'mode_id'])->name('mode');
Route::post('set/learn', ['uses'=>'LearnController@mode3','as'=>'mode_id'])->name('mode');


Route::post('set/result', ['uses'=>'LearnControllerShowResult@result','as'=>'result'])->name('result');
Route::post('set/save', ['uses'=>'ResultsController@store','as'=>'store'])->name('store');
Route::get('/results', 'ResultsController@index');
Route::get('/results/{results}', 'ResultsController@show');
