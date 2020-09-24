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
                从 ETH钱包
            </div>

            <div class="btc_wapper_title">
                到 CNY钱包
            </div>
        </div>
    </div>
    <div class="container">
        <div class="login_wrapper">
            <form action="{{url('transfer') }}" method="post" id="Form">
                {{ csrf_field() }}
                <div class="tibi" style="margin-top: 20px;">转出币种</div>
                <div class="login_wrapper_inp border_1" >
                    <input type="text"   class="wrapper_input" name="type" value="ETH" readonly style="border: 1px solid #d6d6d6; text-indent: 1em;"/>
                </div>
                <div class="tibi" style="margin-top: 10px;">划转数量</div>
                <div class="login_wrapper_inp">
                    <input type="text"  placeholder="@if($eth==0) 0.00000000 @else {{number_format($eth,5,'.','')}} @endif" class="wrapper_input" name="num" style="border: 1px solid #d6d6d6; text-indent: 1em;margin-bottom: 0px;" id="num"/>
                </div>
                <div class="tixing" style="margin-top: 1px; text-align: right;margin-bottom: 1px;">可用@if($eth==0) 0.00000000 @else {{number_format($eth,5,'.','')}} @endif btc</div>
                <div class="tixing" style="margin-top: 1px; text-align: right;margin-bottom: 1px;">当前币价≈{{$bijia}}</div>
                <input type="hidden"   class="wrapper_input" name="uid" value="{{$info->id}}"/>
                <div class="wrapper_submit"  style="margin-bottom: 80px; margin-top: 25px;">
                    <button type="button" class="sub_btn">确认划转</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script>
        $('#num').change(function () {

            if($('#num').val()> {{$eth}}){
                alert('账户划转数量出错');
            }else{
                $('#Form').submit();
            }
        })
    </script>
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

