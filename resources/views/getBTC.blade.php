@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    划转

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
                从 BTC钱包
            </div>

            <div class="btc_wapper_title">
                到 CNY钱包
            </div>
        </div>
    </div>
    <div class="container">
        <div class="login_wrapper">
            <form action="{{url('tibi') }}" method="post" id="loginForm">
                {{ csrf_field() }}
                <div class="tibi" style="margin-top: 20px;">转出币种</div>
                <div class="login_wrapper_inp border_1" >
                    <input type="text"   class="wrapper_input" name="num" value="BTC" readonly style="border: 1px solid #d6d6d6; text-indent: 1em;"/>
                </div>
                <div class="tibi" style="margin-top: 10px;">划转数量</div>
                <div class="login_wrapper_inp">
                    <input type="text"  placeholder="" class="wrapper_input" name="num" style="border: 1px solid #d6d6d6; text-indent: 1em;margin-bottom: 0px;"/>
                </div>
                <div class="tixing" style="margin-top: 1px; text-align: right;margin-bottom: 1px;">可用0.00000000btc</div>


                <div class="wrapper_submit"  style="margin-bottom: 80px; margin-top: 25px;">
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

