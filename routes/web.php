<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', 'IndexController@index');//首页
Route::get('/news', 'IndexController@news');//首页

Route::get('/a/{cid}.html', 'IndexController@article');//首页



Route::post('/admin/sys/send', 'IndexController@send'); //验证码
Route::get('/geetest/apiVerif', 'CommomController@apiVerif');//极验验证提交地址


Route::get('/gonglue', 'IndexController@gonglue');//升级攻略

//前台登录——————用户中心
Route::any('/login', 'IndexController@login');//登录
Route::any('/logout', 'IndexController@logout');//退出登录
Route::any('/register', 'IndexController@register');//注册
Route::any('/product/info/{id}', 'IndexController@info');//登录
Route::group(['middleware'=>['web','Index']],function() {
    Route::get('/share', 'IndexController@share');//邀请
    Route::post('/index/ajax/img', 'IndexController@ajaxImg');//邀请
    Route::get('/invite', 'IndexController@invite');//邀请
    Route::get('/gonglue', 'IndexController@gonglue');//升级攻略
    Route::get('/personal', 'IndexController@personal');//个人中心

});

//总后台系统
Route::any('/admin/sys/login', 'AdminController@login');//登录

Route::group(['middleware'=>['web','Admin']],function() {
    Route::any('/admin/sys/index', 'AdminController@index'); //总后台首页
    Route::get('/admin/sys/column', 'AdminController@column'); //栏目管理
    Route::post('/admin/sys/column/add', 'AdminController@column_add'); //添加栏目
    Route::get('/admin/sys/column/{id}', 'AdminController@columnID'); //通过id查找栏目下文章
    Route::get('/admin/sys/article/{id}', 'AdminController@article');
    Route::post('/admin/sys/article/up', 'AdminController@articleUp');//修改文章提交
    Route::post('/admin/sys/column/edit/{id}', 'AdminController@columnEdit');//修改文章提交
    Route::post('/admin/sys/column/up', 'AdminController@columnUp'); //ajax栏目修改
    Route::get('/admin/sys/article/publisher/add', 'AdminController@publisher'); //发表文章
    Route::post('/admin/sys/articleAdd', 'AdminController@articleAdd'); //文章提交


    //product
    Route::get('/admin/sys/product/attr', 'ProductController@attr'); //属性管理
    Route::post('/admin/sys/product/attr/add', 'ProductController@attrAdd'); //添加属性
    Route::post('/admin/sys/product/attr/up', 'ProductController@attrUp');//修改属性提交
    Route::post('/admin/sys/product/attr/edit/{id}', 'ProductController@attrEdit');//修改文章提交
    Route::post('/admin/sys/product/model/add', 'ProductController@modelAdd'); //添加属性
    Route::post('/admin/sys/product/model/edit/{id}', 'ProductController@modelEdit');//修改文章提交
    Route::post('/admin/sys/product/model/up', 'ProductController@modelUp');//修改属性提交

    Route::get('/admin/sys/product', 'ProductController@product'); //整机模式
    Route::any('/admin/sys/product/add', 'ProductController@productAdd'); //整机模式
    Route::any('/admin/sys/product/edit/{id}', 'ProductController@productEdit'); //整机模式
    Route::post('/admin/sys/product/Up', 'ProductController@productUp'); //整机模式

    Route::get('/admin/sys/crowd', 'ProductController@crowd'); //众筹模式
    Route::any('/admin/sys/crowd/add', 'ProductController@crowdAdd'); //众筹模式


    Route::get('/admin/sys/test', 'AdminController@test'); //栏目管理

});

