@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    设置提现账户

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

    <div class="container" style="background:#f9f9f9; height:auto;overflow: hidden; margin-bottom: 50px;">
        <div class="row">
            <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/cash')}}">
                {{ csrf_field() }}
                <div class="per-list-list brd1px">

                    <div class="per-list-list-mid ">

                        <div class="per-list-list-right wid100">
                            <input type="text" name="username" value="{{isset($data->username)?$data->username:''}}" placeholder="支付宝姓名" class="inpuText" >

                        </div>
                    </div>
                </div>

                <div class="per-list-list brd1px">

                    <div class="per-list-list-mid">

                        <div class="per-list-list-right wid100" >
                            <input type="text" name="userZHIFUBAO" value="{{isset($data->userZHIFUBAO)?$data->userZHIFUBAO:''}}" placeholder="支付宝账户" class="inpuText" >
                        </div>
                    </div>
                </div>

                <div class="per-list-list brd1px">

                    <div class="per-list-list-mid">

                        <div class="per-list-list-right wid100" >
                            <input type="text" name="companyCode" value="{{isset($data->companyCode)?$data->companyCode:''}}" placeholder="银行卡号" class="inpuText" >
                        </div>
                    </div>
                </div>

                <div class="per-list-list brd1px">

                    <div class="per-list-list-mid">

                        <div class="per-list-list-right wid100" >
                            <input type="text" name="bank" value="{{isset($data->bank)?$data->bank:''}}" placeholder="开户行" class="inpuText" >
                        </div>
                    </div>
                </div>

                <div class="btm_wapper" style="margin-top: 20px;">
                    <input type="submit" class="btm_wapper_btn"  value="提交认证"/>
                </div>
            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script>
        $(function () {
            var toast = $('#toast-container');
            setTimeout(function () {
                toast.fadeOut(1000);
            },3000);
        })
    </script>
@stop


