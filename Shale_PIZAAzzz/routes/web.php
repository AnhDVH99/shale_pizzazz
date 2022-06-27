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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'adminrepos'], function () {
    Route::get('', [
        'uses' => 'AdminControllerWithRepos@index',
        'as' => 'admin.index'
    ]);

    Route::get('show/{ad_id}', [
        'uses' => 'AdminControllerWithRepos@show',
        'as' => 'admin.show'
    ]);


    Route::get('update/{ad_id}', [
        'uses' => 'AdminControllerWithRepos@edit',
        'as' => 'admin.edit'
    ]);

    Route::post('update/{ad_id}', [
        'uses' => 'AdminControllerWithRepos@update',
        'as' => 'admin.update'
    ]);
});
Route::group(['prefix' => 'foodrepos'], function () {
    Route::get('', [
        'uses' => 'FoodControllerWithRepos@index',
        'as' => 'food.index'
    ]);

    Route::get('show/{p_id}', [
        'uses' => 'FoodControllerWithRepos@show',
        'as' => 'food.show'
    ]);

    Route::get('create', [
        'uses' => 'FoodControllerWithRepos@create',
        'as' => 'food.create'
    ]);

    Route::post('create', [
        'uses' => 'FoodControllerWithRepos@store',
        'as' => 'food.store'
    ]);

    Route::get('update/{p_id}', [
        'uses' => 'FoodControllerWithRepos@edit',
        'as' => 'food.edit'
    ]);

    Route::post('update/{p_id}', [
        'uses' => 'FoodControllerWithRepos@update',
        'as' => 'food.update'
    ]);

    Route::get('delete/{p_id}', [
        'uses' => 'FoodControllerWithRepos@confirm',
        'as' => 'food.confirm'
    ]);

    Route::post('delete/{p_id}', [
        'uses' => 'FoodControllerWithRepos@destroy',
        'as' => 'food.destroy'
    ]);
});
Route::group(['prefix' => 'category'], function () {
    Route::get('', [
        'uses' => 'CategoryControllerWithRepos@index',
        'as' => 'category.index'
    ]);

    Route::get('show/{ca_ID}', [
        'uses' => 'CategoryControllerWithRepos@show',
        'as' => 'category.show'
    ]);

    Route::get('create', [
        'uses' => 'CategoryControllerWithRepos@create',
        'as' => 'category.create'
    ]);

    Route::post('create', [
        'uses' => 'CategoryControllerWithRepos@store',
        'as' => 'category.store'
    ]);

    Route::get('update/{ca_ID}', [
        'uses' => 'CategoryControllerWithRepos@edit',
        'as' => 'category.edit'
    ]);

    Route::post('update/{ca_ID}', [
        'uses' => 'CategoryControllerWithRepos@update',
        'as' => 'category.update'
    ]);

    Route::get('delete/{ca_ID}', [
        'uses' => 'CategoryControllerWithRepos@confirm',
        'as' => 'category.confirm'
    ]);

    Route::post('delete/{ca_ID}', [
        'uses' => 'CategoryControllerWithRepos@destroy',
        'as' => 'category.destroy'
    ]);
});
Route::group(['prefix' => 'customerrepos'], function () {
    Route::get('', [
        'uses' => 'CustomerControllerWithRepos@index',
        'as' => 'customer.index'
    ]);

    Route::get('show/{cus_id}', [
        'uses' => 'CustomerControllerWithRepos@show',
        'as' => 'customer.show'
    ]);


    Route::get('update/{cus_id}', [
        'uses' => 'CustomerControllerWithRepos@edit',
        'as' => 'customer.edit'
    ]);

    Route::post('update/{cus_id}', [
        'uses' => 'CustomerControllerWithRepos@update',
        'as' => 'customer.update'
    ]);
});

Route::group(['prefix' => 'clientview'], function () {
    Route::get('', [
        'uses' => 'ClientControllerWithRepos@index',
        'as' => 'clientView.index'
    ]);
    Route::get('show/{p_id}', [
        'uses' => 'ClientControllerWithRepos@show',
        'as' => 'clientView.show'
    ]);

});

