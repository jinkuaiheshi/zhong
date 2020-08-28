@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    支付宝支付
                </div>
                <div class="nav_nav">
                    <a href="{{url()->previous()}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="alert alert-success alert-dismissible fade in" role="alert" style="height: 50px;text-align: center;">
            订单金额 <span class="red"> {{$data->TotalPrice}} </span>元
        </div>
    </div>
    <div class="container">


        <img src="{{asset('resources/assets/images/AliPay.jpg')}}" class="wid100"/>


    </div>
    <div>
        <div class="per-out" style="margin-bottom: 60px;">
            <a href="{{url('upload')}}">上传支付凭证</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>




@stop

