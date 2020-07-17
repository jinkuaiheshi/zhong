@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    账户登录
                </div>
                <div class="nav_nav">
                    <a href="{{url('register')}}" style="color:#999">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>

        </div>

{{--        <div style="height: auto; ">--}}
{{--            <div id="embed-captcha"></div>--}}
{{--            <p id="wait" class="">正在加载验证码......</p>--}}
{{--            <p id="notice" class="hide">请先完成验证</p>--}}

{{--            <br>--}}

{{--        </div>--}}
    </div>
    <div class="line"></div>
    <div class="container">
        <div class="login_wrapper">
            <form action="{{url('login') }}" method="post" id="loginForm">
                {{ csrf_field() }}
            <div class="login_wrapper_inp border_1" >
                <input   placeholder="请输入手机号" class="wrapper_input" id="input-area" rows="1" maxlength="11" type="number" autocomplete="off" name="tel" />
            </div>
            <div class="login_wrapper_inp">
                <input type="password"  placeholder="请输入登录密码" class="wrapper_input" name=" password"/>
            </div>
    {{-- 极客验证--}}
        <div style="height: auto; margin-top: 30px;margin-bottom: 30px; ">
            <div id="embed-captcha"></div>
            <p id="wait" class="">正在加载验证码......</p>
            <p id="notice" class="hide">请先完成验证</p>

            <br>

        </div>
        <div class="wrapper_submit">
            <button type="button" class="sub_btn">登录</button>
        </div>

            </form>
            <div class="forget">
                <div class="forget_left">
                    <a href="{{url('forget')}}">忘记密码</a>
                </div>
                <div class="forget_right">
                    还没账号？<a href="{{url('register')}}">立即注册</a>
                </div>
            </div>

    </div>
</div>


<script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>

<script src="{{asset('resources/assets/js/gt.js')}}"></script>
<script>
var handlerEmbed = function (captchaObj) {

// 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode

captchaObj.appendTo("#embed-captcha");
captchaObj.onReady(function () {
$("#wait")[0].className = "hide";
});
};
$.ajax({
// 获取id，challenge，success（是否启用failback）
url: "{{url('geetest/apiVerif')}}?t=" + (new Date()).getTime(), // 加随机数防止缓存
type: "get",
dataType: "json",
success: function (data) {

// 使用initGeetest接口
// 参数1：配置参数
// 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
initGeetest({
    gt: data.gt,
    challenge: data.challenge,
    new_captcha: data.new_captcha,
    product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
    offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
}, handlerEmbed);
}
});
</script>

    <script>
        $('.sub_btn').click(function(){

            if($('[name="geetest_challenge"]').val() != ''  && $('[name="geetest_validate"]').val() != '' && $('[name="geetest_seccode"]').val() != ''){
                $('#loginForm').submit();
            }else{
                return false;
            }
        })
    </script>

@stop