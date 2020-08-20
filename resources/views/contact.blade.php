@extends('header')

@section('content')
    <div class="container" style="background: #f6f6f6">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    联系我们
                </div>
                <div class="nav_nav">
                    <a href="{{url()->previous()}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="contact">
            <div class="contact-title">
                服务热线
            </div>
            <div class="contact-info">
                0574-88138663
            </div>
            <div class="contact-title">
                我们的邮箱
            </div>
            <div class="contact-info">
                zhongwaikuangye@163.com
            </div>
            <div class="contact-title">
                我们的地址
            </div>
            <div class="contact-info">
                宁波市鄞州区恒元商务5-1
            </div>
        </div>
        <div class="map" style="height: 200px;background: #fff; margin-bottom: 60px;" id="map">


        </div>
        <script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp&key=BM7BZ-QKCWW-7ZTR4-RK4EO-2GCI7-BYFWF"></script>



        <script>
            window.onload = function () {
                function init() {
                    // 创建地图
                    var map = new qq.maps.Map(document.getElementById("map"), {
                        center: new qq.maps.LatLng(29.808401, 121.548889),      // 地图的中心地理坐标
                        zoom: 21,     // 地图缩放级别
                        mapStyleId: 'style1'  // 该key绑定的style1对应于经典地图样式，若未绑定将弹出无权限提示窗
                    });
                }
                //调用初始化函数
                init();
            }
        </script>
    </div>

@stop

