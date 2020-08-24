@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    银联支付
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
    <div class="container">

        <img src="{{asset('resources/assets/images/yinlian.jpg')}}" class="wid100"/>
        <table class="table table-striped">
           <tr>
               <td>名称</td>
               <td>中外矿业有限公司宁波分公司</td>
           </tr>
            <tr>
                <td>账户</td>
                <td>8114701012900345333</td>
            </tr>
            <tr>
                <td>开户行</td>
                <td>中信银行宁波鄞州支行</td>
            </tr>
        </table>


    </div>
    <div>
        <div class="per-out" style="margin-bottom: 60px;">
            <a href="{{url('upload')}}">上传支付凭证</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>




@stop

