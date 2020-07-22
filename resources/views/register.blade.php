@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    账户注册
                </div>
                <div class="nav_nav">
                    <a href="{{url('index')}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
    <div class="line"></div>
    <div class="container">
        <div class="login_wrapper">
            <form action="{{url('register') }}" method="post" id="loginForm">
                {{ csrf_field() }}
                <div class="login_wrapper_inp border_1" >
                    <input   placeholder="请输入手机号" class="wrapper_input" id="input-area" rows="1" maxlength="11" type="text"  name="tel" pattern="^1[3-9]\d{9}$"  required />
                </div>
                <div class="login_wrapper_inp border_1">
                    <input type="password"  placeholder="请设置登录密码，7~16位字符不可为纯数字" class="wrapper_input" name="password" required />
                </div>
                <div class="login_wrapper_inp border_1">
                    <input type="password"  placeholder="请确认登录密码" class="wrapper_input" name="repassword" required />
                </div>

                <div class="login_wrapper_inp border_1">
                    <input type="text"  placeholder="请输入邀请码(选填)" class="wrapper_input" name="invite"  />
                </div>
{{--                <div class="form-group ">--}}
{{--                    <div class="pull-xs-left">--}}
{{--                        <label class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-indicator">--}}

{{--                            <span class="custom-control-description font-14">--}}
{{--          已阅读并同意</span>--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                </div>--}}
                <div class="wrapper_submit">
                    <button type="submit" class="sub_btn">登录</button>
                </div>

            </form>

            <div class="forget">
                <div class="forget_right" style="width: 100%; text-align: center">
                                        已有账户？<a href="{{url('login')}}">立即登录</a>
                                    </div>
            </div>

        </div>
    </div>





@stop
