@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    提现提醒

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
    <div class="row">
        <div class="alert alert-success alert-dismissible fade in" role="alert" style="height: 50px;text-align: center;">
            您尚未设置提取账号,请先进行账号设置
        </div>
    </div>
    <div class="container">

        <div class="per-out" style="margin-bottom: 40px;">
            <a href="{{url('cash')}}">立即设置</a>
        </div>
    </div>
@stop