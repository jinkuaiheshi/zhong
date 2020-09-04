@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    升级攻略
                </div>
                <div class="nav_nav">
                    <a href="{{url('invite')}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="aui-content">
        <div class="aui-row aui-margin-15 aui-padded-15" style="background: #f6f6f6;">
            <div class="aui-col-xs-4">
                <img src="{{asset('resources/assets/images/rule1.png')}}" style="width: 80px;float: right !important;" >
            </div>
            <div class="aui-col-xs-4 aui-text-center"><span>等级规则</span></div>
            <div class="aui-col-xs-4">
                <img src="{{asset('resources/assets/images/rule1.png')}}" style="width: 80px;">
            </div>
        </div>
    </div>

    <ul class="aui-list aui-media-list">
        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV1青铜会员:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        未达到白银会员等级的即为青铜会员，无任何返佣权益
                    </div>
                </div>
            </div>
        </li>
        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV2白银会员:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        升级条件:总算力≥110T，即可升级为白银会员
                    </div>
                </div>
            </div>
        </li>




        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV3黄金会员:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        升级条件:总算力≥550T，即可升级为黄金会员
                    </div>
                </div>
            </div>
        </li>



        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV4铂金会员:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        升级条件:总算力≥1650T，即可升级为铂金会员
                    </div>
                </div>
            </div>
        </li>
        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV5钻石会员:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        升级条件:总算力≥5500T，即可升级为钻石会员
                    </div>
                </div>
            </div>
        </li>
        <div class="aui-content">
            <div class="aui-row aui-margin-15 aui-padded-15" style="background: #f6f6f6;">
                <div class="aui-col-xs-4">
                    <img src="{{asset('resources/assets/images/rule1.png')}}" style="width: 80px;" class="aui-pull-right">
                </div>
                <div class="aui-col-xs-4 aui-text-center"><span>等级规则</span></div>
                <div class="aui-col-xs-4">
                    <img src="{{asset('resources/assets/images/rule1.png')}}" style="width: 80px;">
                </div>
            </div>


            <li class="aui-list-item">
                <div class="aui-media-list-item-inner">
                    <div class="aui-list-item-inner">

                        <div class="aui-list-item-text" style="color: #A4A4A4;">
                            一、直接下级用户购买的返佣权益：钻石会员0.5%/月、铂金会员0.4%/月、黄金会员0.3%/月、白银会员0.2%/月。<br>
                            二、间接下级用户购买的返佣权益：（示例：A推荐B，B推荐C）<br>


                        </div>
                    </div>
                </div>
            </li>
        </div></ul>
    <div class="row" style="margin-bottom: 60px; height: auto;overflow:hidden;">
        <img src="{{asset('resources/assets/images/adb.jpg')}}" width="100%">
    </div>
@stop
