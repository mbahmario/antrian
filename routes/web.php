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
Route::get('/lock/unlock', 'LockController@unlock');

Auth::routes();

Broadcast::routes(['middleware' => ['auth', 'web']]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::get('/userslist','UserController@listuser')->name('users.list');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::get('/datapermissions','PermissionController@datapermissions')->name('antrian.datajenisantrian');

Route::resource('jenisantrian', 'JenisantrianController');

Route::get('/datajenisantrian','JenisantrianController@datajenisantrian');

Route::resource('countertpp', 'CountertppController');

Route::get('/datacountertpp','CountertppController@datacountertpp');

Route::resource('antrian', 'AntrianController');

Route::get('/dataantrian','AntrianController@dataantrian');

Route::get('/nextcall','AntrianController@nextcall');

Route::get('/recall','AntrianController@recall');

Route::get('/settingloket','AntrianController@settingloket');


Route::resource('antrianpoli', 'AntrianpoliController');

Route::get('/dataantrianpoli','AntrianpoliController@dataantrianpoli');

Route::get('/nextcallpoli','AntrianpoliController@nextcall');

Route::get('/recallpoli','AntrianpoliController@recall');


