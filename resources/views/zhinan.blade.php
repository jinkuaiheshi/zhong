@extends('pay')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    新手指南
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


       <img src="{{asset('resources/assets/images/zhinan1.jpg')}}" class="wid100"/>
       <img src="{{asset('resources/assets/images/zhinan2.jpg')}}" class="wid100"/>
       <img src="{{asset('resources/assets/images/zhinan3.jpg')}}" class="wid100"/>
       <img src="{{asset('resources/assets/images/zhinan4.jpg')}}" class="wid100"/>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>




@stop

