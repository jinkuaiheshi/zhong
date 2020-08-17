@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    个人中心

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

    <div class="container" style="background:#f9f9f9; height:auto;overflow: hidden; margin-bottom: 50px;">
        <div class="row">
            <div class="per-list-list brd1px">

                <div class="per-list-list-mid ">
                    昵称
                    <div class="per-list-list-right">
                        {{$user->username}}
                    </div>
                    </div>
                </div>

            <div class="per-list-list brd1px">

                <div class="per-list-list-mid">
                    绑定手机号码
                    <div class="per-list-list-right">
                        {{$user->tel}}
                    </div>
                </div>
            </div>
            <div class="per-list-list brd1px">
                <a href="{{url('shiming')}}" style="width: 100%;min-height: 44px;line-height: 44px;">
                    <div class="per-list-list-mid">
                        实名认证
                        <div class="per-list-list-right">
                            <i class="glyphicon glyphicon-chevron-right color999"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="per-list-list brd1px">
                <a href="{{url('passwordEdit')}}" style="width: 100%;min-height: 44px;line-height: 44px;">
                    <div class="per-list-list-mid">
                        修改登录密码
                        <div class="per-list-list-right">
                            <i class="glyphicon glyphicon-chevron-right color999"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop
