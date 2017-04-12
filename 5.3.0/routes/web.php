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


//后台登录
Route::get('adlogin','admin\AdminController@loginview');
Route::post('dologin','admin\AdminController@dologin');
//用户管理
    //用户列表
Route::any('useadd', 'admin\AdminuseController@useadd');
    //渲染添加视图
Route::get('inuseview', 'admin\AdminuseController@inuseview');
    //新增管理员
Route::post('insert','admin\AdminuseController@insert');