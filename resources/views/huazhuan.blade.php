@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    BTC

                </div>
                <div class="nav_nav">
                    <a href="{{url('personal')}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="btc_wapper">
            <div class="btc_wapper_title">
                总资产
            </div>
            <div class="btc_wapper_info" style="margin-top:20px;">
                @if($btc==0) 0.00000000 @else {{number_format($btc,8,'.','')}} @endif
            </div>

        </div>
    </div>

{{--    <div class="container">--}}
{{--        <div class="title_wrapper">--}}
{{--            <div class="nav">--}}
{{--                <div class="nav_title">--}}
{{--                    提币--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container">
        <div class="login_wrapper">
            <form action="{{url('tibi') }}" method="post" id="loginForm">
                {{ csrf_field() }}
                <div class="tibi" style="margin-top: 20px;">提币地址</div>
                <div class="login_wrapper_inp border_1" >
                    <input   placeholder="输入或长按粘贴地址" class="wrapper_input"    type="text" name="url" />
                </div>
                <div class="tibi" style="margin-top: 10px;">提币数量</div>
                <div class="login_wrapper_inp">
                    <input type="text"  placeholder="最低转出金额为0.003" class="wrapper_input" name="num"/>
                </div>
                <div class="tibi" style="margin-top: 10px;">备注（选填）</div>
                <div class="login_wrapper_inp">
                    <input type="text"  placeholder="仅在交易明细展示" class="wrapper_input" name="info"/>
                </div>
                <div class="tishi" style="margin-top: 10px;">温馨提示</div>
                <div class="tishi" style="margin-top: 10px;">BTC地址只能向BTC地址发送资产，任何向非BTC地址发送资产将不可找回。BTC提现费为1%BTC，且最低为0.0005BTC，最低转出金额为0.005BTC。</div>
                <input type="hidden"   class="wrapper_input" name="uid" value="{{$info->id}}"/>
                <input type="hidden"   class="wrapper_input" name="type" value="1"/>
                <div class="wrapper_submit"  style="margin-bottom: 80px; margin-top: 15px;">
                    <button type="submit" class="sub_btn">确认提币</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
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
@stop

