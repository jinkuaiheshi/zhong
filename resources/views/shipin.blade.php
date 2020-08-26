@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    矿场视频
                </div>
                <div class="nav_nav">
                    <a href="{{url('index')}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="new_top">
            <div class="new_top_logo">
                <a href="{{url('index')}}" style="display: inline-block;width: 100%"> <img src="{{asset('resources/assets/images/loggo.png')}}" style="margin-top: 10px;" /></a>

            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 60px;">
        <div class="videoUiWrapper thumbnail">
            <video width="100%" height="214" id="demo1">
                <source src="{{asset('resources/assets/images/shipin7.mp4')}}" type="video/mp4">
            </video>
        </div>

        <div class="videoUiWrapper thumbnail">
            <video width="100%" height="214" id="demo3">
                <source src="{{asset('resources/assets/images/shipin3.mp4')}}" type="video/mp4">
            </video>
        </div>
        <div class="videoUiWrapper thumbnail">
            <video width="100%" height="214" id="demo4">
                <source src="{{asset('resources/assets/images/shipin4.mp4')}}" type="video/mp4">
            </video>
        </div>
        <div class="videoUiWrapper thumbnail" >
            <video width="100%" height="214" id="demo6">
                <source src="{{asset('resources/assets/images/shipin6.mp4')}}" type="video/mp4">
            </video>
        </div>

    </div>
    <script type="text/javascript" src="{{asset('resources/assets/js/jquery-1.8.1.min.js')}}"></script>
    <script src="{{asset('resources/assets/js/jquery.video-ui.js')}}"></script>
    <script>
        $(function () {

            $('#demo1').videoUI({
                'autoplay':true
            });
            $('#demo2').videoUI({
                'autoplay':true

            });
            $('#demo3').videoUI({
                'autoplay':true

            });
            $('#demo4').videoUI({
                'autoplay':true

            });
            $('#demo5').videoUI({
                'autoplay':true

            });
            $('#demo6').videoUI({
                'autoplay':true

            });
        })
    </script>
@stop


