@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    CNY

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
                @if($cny==0) 0.00000000 @else {{number_format($cny,8,'.','')}} @endif
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

                <div class="tibi" style="margin-top: 10px;">提现金额</div>
                <div class="login_wrapper_inp">
                    <input type="text"  placeholder="100元起提" class="wrapper_input" name="num"/>
                </div>
                <div class="tibi" style="margin-top: 10px;">备注（选填）</div>
                <div class="login_wrapper_inp">
                    <input type="text"  placeholder="仅在交易明细展示" class="wrapper_input" name="info"/>
                </div>
                <div class="tishi" style="margin-top: 10px;">温馨提示</div>
                <div class="tishi" style="margin-top: 10px;">提现不需要手续费,币划转CNY<br/>免手续费（根据实时比价结算）</div>
                <input type="hidden"   class="wrapper_input" name="uid" value="{{$info->id}}"/>
                <input type="hidden"   class="wrapper_input" name="type" value="3"/>
                <div class="wrapper_submit"  style="margin-bottom: 80px; margin-top: 15px;">
                    <button type="submit" class="sub_btn">确认提现</button>
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

