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
                    <input   placeholder="请输入手机号" class="wrapper_input" id="input-tel" rows="1" maxlength="11" type="text"  name="tel" pattern="^1[3-9]\d{9}$"  required />
                </div>
                <div class="login_wrapper_inp border_1 position" >
                    <input   placeholder="请输入验证码" class="wrapper_input" id="input-area" rows="1" maxlength="4" type="text"  name="code"   required />
                    <button class="yzm" disabled id="yzm">
                        发送验证码
                    </button>
                </div>
                <div class="login_wrapper_inp border_1">
                    <input type="password"  placeholder="请设置登录密码，7~16位字符不可为纯数字" class="wrapper_input" name="password" required />
                </div>
                <div class="login_wrapper_inp border_1">
                    <input type="password"  placeholder="请确认登录密码" class="wrapper_input" name="repassword" required />
                </div>
                <input type="hidden" value="{{$data}}" name="top">
                <div class="login_wrapper_inp border_1" >
                    <input   placeholder="请输入邀请码" class="wrapper_input" id="input-tel" rows="1" maxlength="4" @if($invite>0) type="hidden" @endif value="{{$invite}}" name="invite" pattern="^1[3-9]\d{9}$" required  />
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


    @if(Session::has('message'))
        <div id="toast-container" class="toast-top-right" aria-live="polite" role="alert"><div class="toast
@if(Session::get('type')=='danger')
                    toast-error
@elseif(Session::get('type')=='success')
                    toast-success
@endif " style="display: block;"><div class="toast-message">
                    {{Session::get('message')}}
                </div></div></div>
    @endif

    <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        $(function () {
            var toast = $('#toast-container');
            setTimeout(function () {
                toast.fadeOut(1000);
            },3000);
        })
    </script>
    <script>
        //监听输入手机号
        $(document).on('input propertychange','#input-tel',function (e) {
            if (e.type === "input" || e.orignalEvent.propertyName === "value") {
                if(this.value.length == 11){
                    var myreg = /1[3-9]\d{9}$/;
                    if(myreg.test(this.value)){
                        $('.yzm').attr("disabled",false);
                        $("body").delegate('.yzm', //会为符合条件的现有标签和未来标签都绑定事件
                            'click', function () {

                                $.post("{{ url('/admin/sys/send') }}",
                                    {'_token': '{{ csrf_token() }}',
                                        'phone':$('#input-tel').val()
                                    }, function(data) {
                                        $("body").append(data);
                                        var toast = $('#toast-container');
                                        setTimeout(function () {
                                            toast.fadeOut(1000);
                                        },3000);
                                    });
                            });
                    }

                    // $('.downloadBtn').removeClass('gray-btn').addClass('blue-btn');
                    // $('.downloadBtn').attr("disabled", false);
                }
            }
        })
    </script>
@stop
