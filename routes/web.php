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

Route::get('/news/a/{cid}', 'IndexController@article');//首页
Route::get('/kuaixun/more', 'IndexController@kuaixunMore');//首页


Route::any('/forget', 'IndexController@forget');//忘记密码
Route::get('/forget/up/{id}', 'IndexController@forgetUP');//忘记密码
Route::post('/forget/up', 'IndexController@forgetPwd');//忘记密码


Route::post('/admin/sys/send', 'IndexController@send'); //验证码
Route::get('/geetest/apiVerif', 'CommomController@apiVerif');//极验验证提交地址

Route::post('/product/order/info/{id}', 'ProductController@item'); //验证码

Route::get('/gonglue', 'IndexController@gonglue');//升级攻略
Route::get('/zhinan', 'IndexController@zhinan');//新人指南
Route::get('/shipin', 'IndexController@shipin');//视频中心

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
    Route::get('/order/{id}', 'ProductController@order');
    Route::post('/order/up', 'ProductController@orderUP');
    Route::get('/pay', 'ProductController@pay');


    Route::get('/order', 'ProductController@userOrder');
    Route::get('/power', 'ProductController@userPower');
    Route::get('/income', 'ProductController@userIncome');
    Route::get('/profile', 'IndexController@profile');
    Route::any('/shiming', 'IndexController@shiming');
    Route::any('/passwordEdit', 'IndexController@passwordEdit');
    Route::any('/pingtai', 'IndexController@pingtai');
    Route::get('/contact', 'IndexController@contact');
    Route::get('/guanyu', 'IndexController@guanyu');
    Route::any('/cash', 'IndexController@cash');
    Route::get('/weixinPay', 'IndexController@weixinPay');
    Route::get('/AliPay', 'IndexController@AliPay');
    Route::get('/YinlianPay', 'IndexController@YinlianPay');
    Route::any('/upload', 'IndexController@upload');
    Route::get('/succ', 'IndexController@succ');
    Route::get('/team', 'IndexController@team');




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
    Route::post('/admin/sys/product/cloud/add', 'ProductController@cloudAdd'); //添加属性
    Route::post('/admin/sys/product/cloud/edit/{id}', 'ProductController@cloudEdit');
    Route::post('/admin/sys/product/cloud/up', 'ProductController@cloudUp');//修改属性提交

    Route::get('/admin/sys/product', 'ProductController@product'); //整机模式
    Route::any('/admin/sys/product/add', 'ProductController@productAdd'); //整机模式
    Route::any('/admin/sys/product/edit/{id}', 'ProductController@productEdit'); //整机模式
    Route::post('/admin/sys/product/Up', 'ProductController@productUp'); //整机模式

    Route::get('/admin/sys/crowd', 'ProductController@crowd'); //众筹模式
    Route::any('/admin/sys/crowd/add', 'ProductController@crowdAdd'); //众筹模式

    Route::get('/admin/sys/cloudPower ', 'ProductController@cloudPower'); //云算力模式
    Route::any('/admin/sys/cloudPower/add ', 'ProductController@cloudPowerAdd'); //云算力模式

    Route::get('/admin/sys/depository ', 'ProductController@depository'); //托管模式
    Route::any('/admin/sys/depository/add ', 'ProductController@depositoryAdd'); //托管模式

    Route::get('/admin/sys/xinren ', 'ProductController@xinren'); //新人专属
    Route::any('/admin/sys/xinren/add ', 'ProductController@xinrenAdd'); //新人专属

    Route::get('/admin/sys/special ', 'ProductController@special'); //新人专属
    Route::any('/admin/sys/special/add ', 'ProductController@specialAdd'); //新人专属

    Route::get('/admin/sys/order', 'ProductController@sysOrder'); //订单管理
    Route::get('/order/complete/{id}', 'ProductController@complete'); //完成支付

    Route::get('/admin/sys/test', 'AdminController@test'); //栏目管理


    //product
    Route::any('/admin/sys/user', 'UserController@index');
    Route::get('/admin/sys/user/{id}', 'UserController@distribution');
    Route::post('/admin/sys/user/info/{id}', 'UserController@info');
    Route::post('/admin/sys/user/invite/{id}', 'UserController@invite');
    Route::post('/admin/sys/user/superior', 'UserController@superior');
    Route::get('/admin/sys/user/lower/{id}', 'UserController@lower');
    Route::post('/admin/sys/user/chakan/{id}', 'UserController@chakan');
    Route::post('/admin/sys/user/bank/{id}', 'UserController@bank');
    Route::post('/admin/sys/user/cash', 'UserController@cash');

    //agent
    Route::any('/admin/agent/user', 'AgentController@index');
    Route::get('/admin/agent/user/lower/{id}', 'AgentController@lower');
    Route::get('/admin/agent/order', 'AgentController@agentOrder'); //订单管理

    Route::post('/admin/agent/user/info/{id}', 'AgentController@info');
    Route::post('/admin/agent/user/superior', 'AgentController@superior');
    Route::post('/admin/agent/user/bank/{id}', 'AgentController@bank');
    Route::post('/admin/agent/user/cash', 'AgentController@cash');
});

