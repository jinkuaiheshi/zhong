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
                        <div class="aui-list-item-title">LV1普通小兵:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        未达到优秀班长等级的即为普通小兵，无任何返佣权益
                    </div>
                </div>
            </div>
        </li>
        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV2优秀班长:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        升级条件:同时满足自购量≥50T、直接推荐算力总量≥50T、直接推荐实名注册用户≥5人、直接推荐下级产生购买数≥2人即可升级为优秀班长
                    </div>
                </div>
            </div>
        </li>




        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV3优秀排长:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        升级条件:同时满足自购量≥100T、直接推荐算力总量≥100T、直接推荐实名注册用户≥20人、直接推荐下级产生购买数≥10人次即可升级为优秀排长。
                    </div>
                </div>
            </div>
        </li>



        <li class="aui-list-item">
            <div class="aui-media-list-item-inner">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-text aui-padded-b-5">
                        <div class="aui-list-item-title">LV4优秀团长:</div>
                    </div>
                    <div class="aui-list-item-text" style="color: #A4A4A4;">
                        升级条件:同时满足自购量≥200T、直接推荐算力总量≥200T、直接推荐实名注册用户≥50人、直
                        接推荐下级产生购买数≥30人即可升级为优秀团长。
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
                            一、直接下级用户购买的返佣权益:优秀班长10元/T、优秀排长20元/T、优秀团长30元/T。<br>
                            二、间接下级用户购买的返佣权益:
                            (示例: A推荐B，B推荐C)<br>


                        </div>
                    </div>
                </div>
            </li>


            <li class="aui-list-item">
                <div class="aui-media-list-item-inner">
                    <div class="aui-list-item-inner">

                        <div class="aui-list-item-text" style="color: #A4A4A4;">
                            <img src="{{asset('resources/assets/images/adb.jpg')}}" width="100%">


                        </div>
                    </div>
                </div>
            </li>



        </div></ul>
@stop
