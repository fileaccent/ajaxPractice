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

Auth::routes(); //vendor\laravel\framework\src\Routing\Router.php auth函数

Route::get('/home', 'HomeController@index')->name('home');


//我写的*_*
//操作者登陆
Route::any('operatorLogin','PeopleController@checkModel');
//人员查询
Route::any('query/{choice}','PeopleController@readModel');
//添加人员
Route::any('insert','PeopleController@insertModel');
//修改人员
Route::any('update','PeopleController@updateModel');